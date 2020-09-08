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
    $aemail = $datax["email_address"];


    $stmt = $con->prepare("INSERT INTO user (username, email, password,name,profile_pic,following) VALUES (?, ?, ?,?,?,?)");
    $blnk = "_";
    $blnkno = "0";
    $stmt->bind_param("ssssss", $ausername, $aemail, $apassword, $blnk, $blnk, $blnkno);


//$stmt->bind_param("i", $id);
    $stmt->execute();
    if($con->error!="") {
        echo display_json($con->error);
    }else{
        echo '{ "message":"Login successful"}';
    }
//echo "New records created successfullyn ";
//echo ;

//$stmt->close();
} else {

    if (isset($_GET["auth"])) {
        $auth_k = $_GET["auth"];
        if (auth($auth_k) != "invalid") {
            if (isset($_GET["q"])) {
                $sqql = "SELECT * FROM user where username='" . $_GET["q"] . "'";;
            } else {
                $sqql = "SELECT * FROM user";
            }

            $result = $con->query($sqql);
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;

            }


            $formatted_results = $rows;
            print display_json($formatted_results);

        } else {
            echo display_json("Invalid API Key");
        }
    } else {
        echo display_json("Missing API Key");
    }
}
?>