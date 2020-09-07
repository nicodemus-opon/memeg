<?php
$datax = json_decode(file_get_contents('php://input'), true);

echo(json_encode($datax, JSON_UNESCAPED_SLASHES));

$ausername = $datax["user_name"];
$apassword = $datax["pass_word"];
$aemail = $datax["email_address"];

// prepare and bind
$stmt = $con->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

