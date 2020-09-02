<?php
include '../include/connect.php';
$sqql = "SELECT * FROM meme";
$result = $con->query($sqql);
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;

}
$formatted_results = $rows;
print json_encode($formatted_results,JSON_UNESCAPED_SLASHES);

?>