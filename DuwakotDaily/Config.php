<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "OnlineShopping";

$connection = mysqli_connect($hostname,$username,$password,$databasename);

if (mysqli_connect_errno()) {
die("Database Connection could not be established.");
}
else {
}
?>