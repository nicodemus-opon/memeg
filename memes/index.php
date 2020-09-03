<?php
header('Content-type: application/json');

include '../include/connect.php';
include '../include/auth.php';
if (isset($_GET["auth"])) {
    $auth_k = $_GET["auth"];
    if (auth($auth_k) != "invalid") {
        if (isset($_GET["m_idb"])) {
            $sqql = "SELECT * FROM meme";
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
        print json_encode($formatted_results, JSON_UNESCAPED_SLASHES);

    } else {
        echo json_encode("Invalid API key", JSON_UNESCAPED_SLASHES);
    }
} else {
    echo json_encode("Missing API key", JSON_UNESCAPED_SLASHES);
}

?>