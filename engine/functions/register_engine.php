<?php if (!defined("DARKCORECMS")) redirect("../../");
class Registration{
    public $registration_errors = array();
    function register_user($username,$_new_password,$re_password,$email,$re_email,$country,$age,$foundus,$robot1,$total = 0,$robot2,$checktext = NULL){
        //Start registering process
        global $database;
        $con = connect($database['auth_db']);
        $this->check_register_variables($username,$_new_password,$re_password,$email,$re_email,$country,$age,$foundus,$robot1,$total,$robot2,$checktext);
        if (count($this->registration_errors) == 0){
            $encr_password = encrypt($username, $_new_password);
            $sql = "INSERT INTO `account` (`username`, `sha_pass_hash`, `email`, `country`, `age`, `foundus`) VALUES (?,?,?,?,?,?)";
            if ($stmt = $con->prepare($sql)) {
                $stmt->bind_param("ssssss", $username, $encr_password, $email, $country, $age, $foundus);
                $stmt->execute();
                $stmt->close();
            }
            $con->close();
            redirect("index?page=login&reg");
        }
    }
    private function check_register_variables($username,$_new_password,$re_password,$email,$re_email,$country,$age,$foundus,$robot1,$total = 0,$robot2,$checktext = NULL){
        //Check every received $_POST variable to make sure everything is alright and ready to run the database query
        $this->check_user_exist($username);
        $this->check_email_exist($email);
        $this->check_country_exist($country);
        $this->check_foundUs_exist($foundus);
        if (strlen($username)  < 3)
            array_push($this->registration_errors, "Username must be at least 3 characters long");
        if (strlen($_new_password)  < 4)
            array_push($this->registration_errors, "Password must be at least 4 characters long");
        if (strlen($age)  < 2 || $age < 10 || $age > 80)
            array_push($this->registration_errors, "Please state your real age");
        if (strlen($robot1)  < 1)
            array_push($this->registration_errors, "Human verification math problem must contain at least 1 character to be validated");
        if (strlen($robot2) < 1)
            array_push($this->registration_errors, "Human verification text field must contain at least 1 character to be validated");
        if ($_new_password != $re_password)
            array_push($this->registration_errors, "Passwords doesn't match");
        if ($email != $re_email)
            array_push($this->registration_errors, "Emails doesn't match");
        if ($robot1 != $total)
            array_push($this->registration_errors, "Human verification math problem incorect answer");
        if (strtoupper($robot2) != $checktext)
            array_push($this->registration_errors, "Human verification text field incorect answer");
    }

    private function check_user_exist($username){
        //Check if a user with the same username already exist in database
        global $database;
        $con = connect($database['auth_db']);
        $stmt = $con->prepare("SELECT * FROM `account` WHERE `username` = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0)
            array_push($this->registration_errors, "This username is already in use please choose another");
        $stmt->close();
        $con->close();
    }
    private function check_country_exist($country){
        //Check if country exist in the given list to avoid dev tools editing and sending wrong variables
        global $database;
        $con = connect($database['web_db']);
        echo $country;
        $stmt = $con->prepare("SELECT * FROM `countries` WHERE `country` = ?");
        $stmt->bind_param("s", $country);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 0)
            array_push($this->registration_errors, "This country does not appear on existing countries list");
        $stmt->close();
        $con->close();
    }
    private function check_foundUs_exist($way){
        //Check if method exist in the given list to avoid dev tools editing and sending wrong variables
        global $database;
        $con = connect($database['web_db']);
        echo $way;
        $stmt = $con->prepare("SELECT * FROM `contacts` WHERE `way` = ?");
        $stmt->bind_param("s", $way);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 0)
            array_push($this->registration_errors, "The selected way does not appear in our ways list please choose another");
        $stmt->close();
        $con->close();
    }
    private function check_email_exist($email){
        //Check if a registered account already use the given email
        global $database;
        $con = connect($database['auth_db']);
        $stmt = $con->prepare("SELECT * FROM `account` WHERE `email` = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0)
            array_push($this->registration_errors, "This email is already in use please choose another");
        $stmt->close();
        $con->close();
    }

}