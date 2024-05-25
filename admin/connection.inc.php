<?php
include "../backend/config/config.php";
session_start();
$username = DB_USER;
$password = DB_PASS;
$server = DB_HOST;
$database =DB_NAME;

$conn = mysqli_connect($server, $username, $password, $database );
if(!$conn){
    die("Error :". mysqli_connect_error());
}

?>
