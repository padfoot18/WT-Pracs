<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "person";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
	die();

?>