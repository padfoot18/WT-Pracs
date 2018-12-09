<?php
include 'db_conn.php';
if(isset($_POST['submit']))
{
	$rollno = $_POST['rollno'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$sql = "INSERT INTO stud_data VALUES ($rollno, '$fname', '$lname', '$email');";
	if(mysqli_query($conn, $sql))
	{
		header('Location: /student/');
		exit();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add new</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid form-group" style="width: 50%; margin-top: 20px">
	<form method="post">
		<label for="rollno">Roll No</label>
		<input class="form-control" type="text" name="rollno">
		<label for="fname">First Name</label>
		<input class="form-control" type="text" name="fname">
		<label for="lname">Last Name</label>
		<input class="form-control" type="text" name="lname">
		<label for="email">Email id</label>
		<input class="form-control" type="email" name="email">
		<input class="btn btn-default" type="submit" name="submit"
					 style="margin-top: 10px">
	</form>
</div>
</body>
</html>