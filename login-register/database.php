<?php
$hostname = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_register";
$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);
// check error
if (!$conn) {
    die("Something went wrong!");
}
