<?php 
include 'db_conn.php';

$sql = "DELETE FROM stud_data WHERE rollno=".$_GET['rollno'].";";
if(mysqli_query($conn, $sql))
{
	header('Location: /student/');
	exit();
}
?>