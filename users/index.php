<?php
header('Content-type: application/json');
echo json_encode($_POST, JSON_UNESCAPED_SLASHES);

?>