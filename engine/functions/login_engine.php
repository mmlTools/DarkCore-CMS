<?php if (!defined("DARKCORECMS")) header('Location: ../../');

class Login {
    public $login_errors = array();
    function do_login($username, $password){
        //Check if everything is ok so we can start the login process
        $password = encrypt($username, $password);
        $this->verify_login($username, $password);
        if (count($this->login_errors) == 0) {
            $_SESSION['usr'] = $username;
            redirect("index?page=user");
        }
    }

    private function verify_login($USR, $PSW) {
        //Verify if the user wit the following password exists in database
        global $database;
        $con = connect($database['auth_db']);
        $sql = "SELECT * FROM `account` WHERE `username` = ? and `sha_pass_hash` = ?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("ss", $USR, $PSW);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows == 0)
                array_push($this->login_errors, "Wrong username or password please try again");
            $stmt->close();
        }
        $con->close();
    }
}