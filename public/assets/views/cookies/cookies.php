<?php
$counter = $_COOKIE['counter'] ?? 0;
$counter = $counter + 1;
setcookie('counter', $counter);

$message = 'Page Views:' . $counter;
?>
