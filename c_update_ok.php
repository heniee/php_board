<?php

include 'index.php';
session_start();

$cno = $_POST['cno'];
$userid = $_SESSION['userid'];
$content = $_POST['content'];

print($cno);
print($userid);
print($content);
?>