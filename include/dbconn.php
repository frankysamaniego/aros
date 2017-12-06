<?php
date_default_timezone_set("Asia/Manila");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aros";
$mysqli = new mysqli($servername, $username, $password,$dbname);
//$conn = mysql_connect($servername, $username, $password);
//$con = mysqli_connect($servername, $username, $password,$dbname);
 
session_start();
// Check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}