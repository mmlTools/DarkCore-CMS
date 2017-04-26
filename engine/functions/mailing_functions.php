<?php if (!defined("DARKCORECMS")) header('Location: ../../');
class Mailing{
    function sendInbox($from, $to, $subject, $body){
        global $database;
        $con = connect($database['web_db']);
        $date = time();
        $sql = "INSERT INTO `inbox`(`from`, `to`, `subject`, `body`, `date`) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = $con->prepare($sql)){
            $stmt->bind_param('sissi', $from, $to, $subject, $body, $date);
            $stmt->execute();
            $stmt->close();
        }
        $con->close();
    }
}
$mailing = new Mailing;