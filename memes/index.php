<?php
header('Content-type: application/json');

include '../include/connect.php';
include '../include/auth.php';
include '../include/methods_.php';
if (isset($_GET["auth"])) {
    $auth_k = $_GET["auth"];
    if (auth($auth_k) != "invalid") {
        if (isset($_GET["q"])) {
            $sqql = "SELECT * FROM meme where caption like '%".$_GET['q']."%'";
            echo $sqql;
        } elseif (isset($_GET["m_id"])) {
            $sqql = "SELECT * FROM meme where Meme_id='" . $_GET["m_id"] . "'";
        } elseif (isset($_GET["m_id"])) {
            $sqql = "SELECT * FROM meme where Meme_id='" . $_GET["m_id"] . "'";
        } else {
            $sqql = "SELECT * FROM meme";
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

?>