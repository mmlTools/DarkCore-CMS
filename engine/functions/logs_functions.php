<?php if (!defined("DARKCORECMS")) header('Location: ../../');

class Logger{
    function clearLogs($log){
        //will be called from admin panel to clear logs from specific table
        //ATTENTION!!! this will remove everything from that table
        switch($log){
            case "voteLog":
                $this->clearVoteLogs();
                break;
            case "storeLog":
                $this->clearStoreLogs();
                break;
        }
    }
    function getLogs($log){
        //get logs from specific table and return them as array
        $logs_list = array();
        switch($log){
            case "voteLog":
                $logs_list = $this->getVoteLogs();
                break;
            case "storeLog":
                $logs_list = $this->getStoreLogs();
                break;
        }
        return $logs_list;
    }
    function setLogs($log, $args){
        //set logs for specific table $args = array
        switch($log){
            case "voteLog":
                // voteLog Args Description
                // $args[0] = account id
                // $args[1] = site id
                // $args[2] = time when voted
                // $args[3] = time until this vote expire
                $this->setVoteLogs($args);
                break;
            case "storeLog":
                // storeLog Args Description
                // $args[0] = Title
                // $args[1] = Description
                // $args[2] = purchase time
                $this->setStoreLogs($args);
                break;
        }
    }
    function deleteLogs($log, $id){
        //delete logs from specific table based on id
        switch($log){
            case "voteLog":
                $this->deleteVoteLog($id);
                break;
            case "storeLog":
                $this->deleteStoreLog($id);
                break;
        }
    }
    private function setVoteLogs($args){
        //setting up database connection variables
        global $database;
        $con = connect($database['web_db']);

        //Parse arguments to specific variables
        $account = $args[0]; $siteID = $args[1]; $voted_time = $args[2]; $expiration_time = $args[3];

        //setup connection and insert log to database
        $sql = "INSERT INTO `vote_logs`(`account`, `site`, `voted`, `expire`) VALUES (?, ?, ?, ?);";
        if ($stmt = $con->prepare($sql)){
            $stmt->bind_param("iiii", $account, $siteID, $voted_time, $expiration_time);
            $stmt->execute();
            $stmt->close();
        }
        $con->close();
    }
    private function getVoteLogs(){
        //setting up database connection variables
        global $database;
        $con = connect($database['web_db']);

        //set up a list for our logs
        $logs_list = array();
        $sql = "SELECT * FROM `vote_logs`;";
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $result = $stmt->get_result();
            while($data = $result->fetch_assoc()){
                array_push($logs_list, array(
                    "id" => $data['id'],
                    "account" => $data['account'],
                    "site" => $data['site'],
                    "voted" => $data['voted'],
                    "expire" => $data['expire']
                ));
            }
            $stmt->close();
        }
        $con->close();
        return $logs_list;
    }
    private function clearVoteLogs(){
        //Using this function will clear everything from vote logs and will allow players to vote again !!ATTENTION!!
        //setting up database connection variables
        global $database;
        $con = connect($database['web_db']);
        $sql = "DELETE FROM `vote_logs`";
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->close();
        }
        $con->close();
    }
    private function deleteVoteLog($id){
        //setting up database connection variables
        global $database;
        $con = connect($database['web_db']);
        $sql = "DELETE FROM `vote_logs` WHERE `id` = ?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
        $con->close();
    }
    private function setStoreLogs($args){
        //setting up database connection variables
        global $database;
        $con = connect($database['web_db']);

        //Parse arguments to specific variables
        $title = $args[0]; $description = $args[1]; $purchase_date = $args[2];

        //setup connection and insert log to database
        $sql = "INSERT INTO `store_logs`(`title`, `body`, `date`) VALUES (?, ?, ?);";
        if ($stmt = $con->prepare($sql)){
            $stmt->bind_param("ssi", $title, $description, $purchase_date);
            $stmt->execute();
            $stmt->close();
        }
        $con->close();
    }
    private function getStoreLogs(){
        //setting up database connection variables
        global $database;
        $con = connect($database['web_db']);

        //set up a list for our logs
        $logs_list = array();
        $sql = "SELECT * FROM `store_logs`;";
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $result = $stmt->get_result();
            while($data = $result->fetch_assoc()){
                array_push($logs_list, array(
                    "id" => $data['id'],
                    "title" => $data['title'],
                    "body" => $data['body'],
                    "date" => $data['date']
                ));
            }
            $stmt->close();
        }
        $con->close();
        return $logs_list;
    }
    private function clearStoreLogs(){
        //setting up database connection variables
        global $database;
        $con = connect($database['web_db']);
        $sql = "DELETE FROM `store_logs`";
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->close();
        }
        $con->close();
    }
    private function deleteStoreLog($id){
        //setting up database connection variables
        global $database;
        $con = connect($database['web_db']);
        $sql = "DELETE FROM `store_logs` WHERE `id` = ?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
        $con->close();
    }
}
$logger = new Logger;