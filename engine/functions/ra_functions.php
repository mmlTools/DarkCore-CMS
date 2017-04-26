<?php if (!defined("DARKCORECMS")) header('Location: ../../');
class RemoteAccess
{
    public $errors = array();

    private function telnet(){
        global $remote_ac;
        $telnet = fsockopen($remote_ac['ra_host'], $remote_ac['ra_port'], $error, $error_str, 3);
        if (!$telnet)
            echo "{$error_str} ({$error})<br />\n";
        else
            return $telnet;
    }

    function get_cart($account_id, $character_guid){
        global $database;
        $con = connect($database['web_db']);
        $cart = array();
        $sql = "SELECT * FROM `store_cart` WHERE `account_id` = ? AND `character_id` = ?";
        if ($stmt = $con->prepare($sql)){
            $stmt->bind_param("ii", $account_id, $character_guid);
            $stmt->execute();
            $result = $stmt->get_result();
            while($data = $result->fetch_assoc()){
                array_push($cart, array(
                    "account_id" => $data['account_id'],
                    "character_id" => $data['character_id'],
                    "item" => $this->get_store_itemById($data['itemid'])
                ));
            }
            $stmt->close();
        }
        $con->close();
        return $cart;
    }
    function clear_cart($account_id, $character_guid){
        global $database;
        $con = connect($database['web_db']);
        $sql = "DELETE FROM `store_cart` WHERE `account_id` = ? AND `character_id` = ?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("ii", $account_id, $character_guid);
            $stmt->execute();
            $stmt->close();
        }
        $con->close();
    }
    function delete_item_from_cart($account_id, $character_guid, $itemid){
        global $database;
        $con = connect($database['web_db']);
        $sql = "DELETE FROM `store_cart` WHERE `account_id` = ? AND `character_id` = ? AND `itemid` = ?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("iii", $account_id, $character_guid, $itemid);
            $stmt->execute();
            $stmt->close();
        }
        $con->close();
    }
    private function get_store_itemById($item_id){
        global $database;
        $con = connect($database['web_db']);
        $sql = "SELECT * FROM `store_items` WHERE `item_id` = ?";
        $item = array();
        if ($stmt = $con->prepare($sql)){
            $stmt->bind_param("i", $item_id);
            $stmt->execute();
            $result = $stmt->get_result();
            while($data = $result->fetch_assoc()){
                $item = array(
                    "itemid" => $data['itemid'],
                    "vp_price" => $data['vp_price'],
                    "dp_price" => $data['dp_price']
                );
            }
            $stmt->close();
        }
        $con->close();
        return $item;
    }
    function send_StoreItem($account_id, $character_guid)
    {
        //establish a remote connection
        global $remote_ac, $database, $logger, $mailing;
        $ra = $this->telnet();

        //establish a database connection
        $con = connect($database['web_db']);

        //define our global variables for this function
        $char = '';
        $status = 0;
        $cart = $this->get_cart($account_id, $character_guid);
        $time = time();

        //check if we have a remote connection and try to start the sending item process
        if ($ra) {
            sleep(5);
            fputs($ra, '' . $remote_ac['ra_user'] . "\n");
            sleep(5);
            fputs($ra, '' . $remote_ac['ra_password'] . "\n");
            sleep(3);

            //at this point we have a remote connection and we are connected to worldserver.exe it's time to setup our variables
            $subject = "Item Store Purchase";
            $text = "Thank You, for your purchase.";

            //get gharacter name and also verify if character exist
            $verify_character_sql = ("SELECT `account`, `guid`, `name` FROM `characters` WHERE `guid` = ?");
            if ($stmt = $con->prepare($verify_character_sql)) {
                $stmt->bind_param("i", $character_guid);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($data = $result->fetch_assoc()) {
                    $char = $data['name'];
                    $char_account_id = $data['account'];
                }
            }

            //check if character exist else return error and prevent execution
            if ($char == '')
                array_push($this->errors, 'This character does not exist');

            //check if character belong to the same player account to prevent anny type of hack atempts
            if ($char != '' && isset($char_account_id) && $char_account_id != $account_id)
                array_push($this->errors, 'This character does not belong to your account');

            //check errors length and execute the send command if there are no errors
            //.send items characterName mailboxSubject item
            if (count($this->errors) == 0) {
                foreach ($cart as $cr)
                    fputs($ra, ".send items $char \" {$subject} \" \"{$text}\" {$cr['item']['itemid']} \n");
                $status = 0;
            }
            else
                $status = 1;
            sleep(3);
            fclose($ra);
        }
        else
           $status = 2;

        //Done sending the items now we are going to send the logs and deduct points
        switch($status){
            case 0:
                //item was sent and we are going to deduct the points and set the log
                $log_title = "ITEM SENDING SUCCESS";
                $log_text = "The following items were successfully sent to {$char} - GUID: {$character_guid}:\n\n";
                $total_vp = 0;
                $total_dp = 0;
                $mail_subject = "Items Purchasing Successful";
                $mail_body = "Thank you for purchasing from our shop.\n";
                foreach ($cart as $cr) {
                    $log_text .= "- Item Id: {$cr['item']['itemid']}\n";
                    $total_vp += $cr['item']['vp_price'];
                    $total_dp += $cr['item']['dp_price'];
                }
                $mail_body .= $log_text;
                set_currency($account_id, $total_vp, $total_dp, "-");
                $logger->setLogs("storeLogs", array($log_title, $log_text, $time));
                $this->clear_cart($account_id, $character_guid);
                $mailing->sendInbox("Administration", $account_id, $mail_subject, $mail_body);
                break;
            case 1:
                //there was an error executing the remote command and items were not sent
                $log_title = "ITEM SENDING FAILED";
                $log_text = "{$char} - GUID: {$character_guid} attempt to buy the following items:\n\n";
                $mail_subject = "Items Purchasing Failed";
                $mail_body = "It look like there was an error while you attempt to buy from the store, a notification was sent to administrators.\n";
                foreach ($cart as $cr)
                    $log_text .= "- Item Id: {$cr['item']['itemid']}\n";
                $mail_body .= $log_text;
                $logger->setLogs("storeLogs", array($log_title, $log_text, $time));
                $mailing->sendInbox("Administration", $account_id, $mail_subject, $mail_body);
                break;
            case 2:
                //remote connection could not be established
                $log_title = "ITEM SENDING FAILED";
                $log_text = "Remote access could not be established when {$char} - GUID: {$character_guid} atempted to buy the following items:\n\n";
                $mail_subject = "Items Purchasing Failed";
                $mail_body = "Remote connection could not be established while attempting to buy from the store, a notification was sent to administrators.\n";
                foreach ($cart as $cr)
                    $log_text .= "- Item Id: {$cr['item']['itemid']}\n";
                $mail_body .= $log_text;
                $logger->setLogs("storeLogs", array($log_title, $log_text, $time));
                $mailing->sendInbox("Administration", $account_id, $mail_subject, $mail_body);
                break;
        }
    }
}
$remote_access = new RemoteAccess;