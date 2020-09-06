<?php
$datax = json_decode(file_get_contents('php://input'), true);

echo(json_encode($datax, JSON_UNESCAPED_SLASHES));

