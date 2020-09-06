<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "mobisoko_memes";
//$username = "nico";
$password = "8y+yELxRQcI@";
$dbname = "mobisoko_memes";
//$dbport = 3306;
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}





?>