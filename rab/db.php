
<?php
$server = "rab";
$username = "root";
$password = "";
$dbname = "regist";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
