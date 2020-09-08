<?php
header('Content-type: application/json');

include '../include/connect.php';
include '../include/auth.php';
include '../include/methods_.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$datax = json_decode(file_get_contents('php://input'), true);

if (isset($datax["user_name"])) {
//echo(json_encode($datax, JSON_UNESCAPED_SLASHES));
//print_r($datax);
    $ausername = $datax["user_name"];
    $apassword = $datax["pass_word"];
    $sqql = "SELECT * FROM user WHERE username = '$ausername' and password = '$apassword'";
    $result = $con->query($sqql);
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    if (isset($rows)) {
        $formatted_results = $rows;
        print display_json($formatted_results);
    } else {
        print display_json("Invalid credentials");
    }

} else {
    print display_json("No Post Data");
}