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
    $password = sha1(strtoupper($username) . ":" . strtoupper($password));
    $password = strtoupper($password);
    return $password;
}
function logout()
{
    session_unset();
    redirect("index");
}
function redirect($url){
    echo "<script type='text/javascript'>window.location.href = '".$url."'</script>";
}
function get_countries_list(){
    global $database;
    $con = connect($database['web_db']);
    $sql = "SELECT * FROM `countries`";
    $countries = array();
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
