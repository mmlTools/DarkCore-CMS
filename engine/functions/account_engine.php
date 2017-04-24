<?php if (!defined("DARKCORECMS")) header('Location: ../../');
class Account {
    public $account = array();
    function __construct(&$username){
        $this->account = array(
            "info" => $this->get_acc_info($username)
        );
    }
    private function get_acc_info($__username){
        global $database;
        $con = connect($database['auth_db']);
        $sql = "SELECT `id`, `username`, `email`, `joindate`, `last_login`, `vp`, `total_votes`, `dp`, `age`, `country`, `foundus`, `nickname`, `avatar`, `last_ip` FROM `account` WHERE username = ?";
        $info = array();
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param('s', $__username);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($data = $result->fetch_assoc()) {
                $info = array(
                    "id" => $data['id'],
                    "username" => $data['username'],
                    "email" => $data['email'],
                    "joindate" => $data['joindate'],
                    "last_login" => $data['last_login'],
                    "vp" => $data['vp'],
                    "total_votes" => $data['total_votes'],
                    "dp" => $data['dp'],
                    "age" => $data['age'],
                    "country" => $data['country'],
                    "foundus" => $data['foundus'],
                    "nickname" => $data['nickname'],
                    "avatar" => $data['avatar'],
                    "last_ip" => $data['last_ip'],
                    "rank" => get_rank($data['id'])
                );
            }
            $stmt->close();
        }
        $con->close();
        return $info;
    }
    function set_avatar($userid,$avatar){
        global $database;
        $con = connect($database['auth_db']);
        $dirname = "images/avatars/".$avatar;
        $sql = "UPDATE `account` SET `avatar` = ? WHERE id = ?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("si", $dirname, $userid);
            $stmt->execute();
            $stmt->close();
        }
        $con->close();
    }
}