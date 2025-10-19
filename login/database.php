<?php

$hostname = "localhost";
$bdUser = "root";
$dbPassword = "";
$dbName = "login_register";
$conn = mysqli_connect($hostname, $bdUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong");
}
