<?php

header('Content-type: application/json');

include '../include/connect.php';
include '../include/auth.php';
include '../include/methods_.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET["auth"])) {
    $auth_k = $_GET["auth"];
    if (auth($auth_k) != "invalid") {
        if (isset($_GET["user_name"])) {
            $sql = "UPDATE user SET Name='" . $_GET["full_name"] . "',Password='" . $_GET["pass_word"] . "' WHERE username='" . $_GET["user_name"] . "'";
        } else {
            $sql = "SELECT * FROM user";
        }

        if ($con->query($sql) === TRUE) {
            $formatted_results = '{"message","Record updated successfully"}';
        } else {
            $formatted_results = '{"message","error updating"}';
        }

        echo ($formatted_results);

    } else {
        echo display_json("Invalid API Key");
    }
} else {
    echo display_json("Missing API Key");
}