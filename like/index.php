<?php
if (isset($_GET["meme_id"])) {
    $sql = "select * from Meme_Id where username='" . $_GET["meme_id"] . "'";
    $result = $con->query($sql);
    while ($row = $result->fetch_assoc()) {
        $mylikes = (int)$row["likes"];

    }
    $mylikes = $mylikes + $_GET["q"];
    $sql = "UPDATE meme SET likes='$mylikes' WHERE Meme_Id='" . $_GET["meme_id"] . "'";

    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }
}

$result = $con->query($sqql);
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;

}


$formatted_results = $rows;
print display_json($formatted_results);

?>