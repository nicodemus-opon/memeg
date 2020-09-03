<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function auth($api_key)
{

    include 'connect.php';
    $authsql = "SELECT * FROM credentials where api_key='" . $api_key . "'";

    //echo $authsql;
    $resultx = $con->query($authsql);

    $assocx = $resultx->fetch_assoc();
    if ($assocx > 0) {
        while ($arow = $assocx) {
            $credentials = $arow;
            return $credentials;
        }
    } else {
        return "invalid";
    }
}

//print_r(auth("yeet"));

?>