<?php
require_once 'form2.php';
$input = $_POST['title'];
$textarea = $_POST['text'];

$sql = "INSERT INTO `fafa2`(`input`, `text_area`) VALUES ('$input','$textarea')";





$db->query($sql);