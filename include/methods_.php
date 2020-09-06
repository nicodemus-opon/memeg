<?php
function display_json($text)
{
    return json_encode($text, JSON_UNESCAPED_SLASHES);
}

?>
