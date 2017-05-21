<?php if (!defined("DARKCORECMS")) header('Location: ../../');
function connect($data_db)
{
    //Call database connection on a specific database
    //Database must be defined by user in function header
    global $database;
    $con = mysqli_connect($database['db_host'], $database['db_username'], $database['db_password'], $data_db);
    if (!$con) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    return $con;
}
function time_to_string($time){
    //Timestamp to dd/mm/yyyy string
    $dateinfo = getdate($time);
    return $dateinfo["mday"].' '.$dateinfo["month"].' '.$dateinfo["year"];
}
function date_string($dateint, $format = "Y-m-d H:i:s"){
    return date($format, $dateint);
}
function encrypt($username, $password)
{
    //encryption method for passwords
    $password = sha1(strtoupper($username) . ":" . strtoupper($password));
    $password = strtoupper($password);
    return $password;
}

function logout(){
    session_unset();
    redirect("index");
}

function redirect($url){
    $mainPath = $_SERVER['REQUEST_URI'];
    $url = "Location: {$mainPath}{$url}";
    header($url);
}

function get_countries_list(){
    //return countries strings list from countries table
    //establish a database connection and prepare the sql query
    global $database;
    $con = connect($database['web_db']);
    $sql = "SELECT * FROM `countries`";
    $countries = array();

    //execute the query and return the countries list
    if ($stmt = $con->prepare($sql)){
        $stmt->execute();
        $result = $stmt->get_result();
        while($data = $result->fetch_assoc()){
            array_push($countries, $data['country']);
        }
        $stmt->close();
    }
    $con->close();
    return $countries;
}
function get_findOptions_list(){
    global $database;
    $con = connect($database['web_db']);
    $sql = "SELECT * FROM `contacts`";
    $contacts = array();
    if ($stmt = $con->prepare($sql)){
        $stmt->execute();
        $result = $stmt->get_result();
        while($data = $result->fetch_assoc()){
            array_push($contacts, $data['way']);
        }
        $stmt->close();
    }
    $con->close();
    return $contacts;
}
function get_rank($id){
    global $database;
    $con = connect($database['auth_db']);
    $sql = "SELECT `gmlevel` FROM `account_access` WHERE `id` = ?";
    $level = 0;
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($data = $result->fetch_assoc()) {
            $level = $data['gmlevel'];
        }
        $stmt->close();
    }
    $con->close();
    return $level;
}
function set_currency($account, $val_vp, $val_dp, $set = "+"){
    //set vote points and donation points function for global use
    // $account -> account id where points will be added/deducted
    // $val_XX -> value to be added/deducted
    // $set -> + will add points
    // $set -> - will remove points
    global $database;
    $con = connect($database['auth_db']);

    //we need an error counter to return for error handlers
    $error = 0;

    //get player current VP and DP values
    $currency_values = get_currency($account);

    switch($set){
        case "+":
            if ($val_vp < $currency_values['vp']) //make sure account has enough points
                $error = 1;
            else
                $val_vp = $currency_values['vp'] + $val_vp;
            if ($val_dp < $currency_values['dp']) //make sure account has enough points
                $error = 1;
            else
                $val_dp = $currency_values['dp'] + $val_dp;
            break;
        case "-":
            if ($val_vp < $currency_values['vp']) //make sure account has enough points
                $error = 1;
            else
                $val_vp = $currency_values['vp'] - $val_vp;
            if ($val_dp < $currency_values['dp']) //make sure account has enough points
                $error = 1;
            else
                $val_dp = $currency_values['dp'] - $val_dp;
            break;
        default:
            if ($val_vp < $currency_values['vp']) //make sure account has enough points
                $error = 1;
            else
                $val_vp = $currency_values['vp'] + $val_vp;
            if ($val_dp < $currency_values['dp']) //make sure account has enough points
                $error = 1;
            else
                $val_dp = $currency_values['dp'] + $val_dp;
            break;
    }

    //create our sql query based on the values we have received earlier
    $sql = "UPDATE `account` SET `vp` = ?, `dp` = ? WHERE `id` = ?";


    //time to run the sql query if we have no errors
    if ($error == 0) {
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("iii", $val_vp, $val_dp, $account);
            $stmt->execute();
        }
    }

    //we are going to return the error for further use
    return $error;
}

function get_currency($account){
    //get the amount of vote and donation points for a specific account
    global $database;
    $con = connect($database['auth_db']);
    $sql = "SELECT `vp`, `dp` FROM `account` WHERE `id` = ?";
    $currency = array();
    if ($stmt = $con->prepare($sql)){
        $stmt->bind_param("i", $account);
        $stmt->execute();
        $result = $stmt->get_result();
        while($data = $result->fetch_assoc()){
            $currency = array(
                "vp" => $data['vp'],
                "dp" => $data['dp']
            );
        }
        $stmt->close();
    }
    $con->close();
    return $currency;
}
