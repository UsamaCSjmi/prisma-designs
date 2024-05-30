<?php
session_start();
//localhost
// $username = "root";
// $password = "";
// $server = "localhost";
// $database ="ccp";



//Server
$username = "u936121314_campusconnect";
$password = "vmV/wb#1Qo:";
$server = "localhost";
$database ="u936121314_campusconnect";

$conn = mysqli_connect($server, $username, $password, $database );
if(!$conn){
    die("Error :". mysqli_connect_error());
}
?>