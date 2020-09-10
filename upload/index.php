<?php
header('Content-type: application/json');

include '../include/connect.php';
include '../include/auth.php';
include '../include/methods_.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$datax = json_decode(file_get_contents("php://input"), true);


if (isset($datax["user_name"])) {
//echo(json_encode($datax, JSON_UNESCAPED_SLASHES));
//print_r($datax);
    $ausername = $datax["user_name"];
    $apicvid = $datax["Pic_VId"];
    $acaption = $datax["caption"];
    $acategory = $datax["category"];
    $amtext = $datax["meme_text"];

    $stmt = $con->prepare("INSERT INTO meme (username, pic_Vid, caption,category,meme_text) VALUES (?, ?, ?,?,?)");

    $blnk = "_";
    $blnkno = "0";
    $stmt->bind_param("sssss", $ausername, $apicvid, $acaption, $acategory, $amtext);


//$stmt->bind_param("i", $id);
    $stmt->execute();
    if ($con->error != "") {
        echo display_json($con->error);
    } else {
        echo '{ "message":"added successful"}';
    }
//echo "New records created successfullyn ";
//echo ;

//$stmt->close();
} else {
    echo display_json("no post data");
}
?>