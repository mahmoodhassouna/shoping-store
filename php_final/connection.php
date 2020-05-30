<?php 
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "project_php";


$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);


if (mysqli_connect_error()) {
 die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
?>