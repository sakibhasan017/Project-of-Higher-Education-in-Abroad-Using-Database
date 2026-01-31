<?php
$host = "sql107.yzz.me";
$user = "yzzme_41033560";
$password = "sakib097";
$db_name = "yzzme_41033560_project22";

$con = mysqli_connect($host, $user, $password, $db_name);

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
