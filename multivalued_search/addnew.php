<?php
include 'db_conn.php';
if (isset($_POST['submit'])) 
	if($_POST['name'] !== '')
	{
		$name = $_POST['name'];
		$country = $_POST['country'];
		$gender = $_POST['gender'];

		$sql = "INSERT INTO person_data (name, country, gender) VALUES ('$name', '$country', '$gender');";
		if(mysqli_query($conn, $sql))
		{
			header('Location: /mult-search/');
			exit();
		}
	}
?>