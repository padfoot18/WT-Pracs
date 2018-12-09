<?php
if (isset($_POST['submit'])) {
	include 'db_conn.php';
	$insert_vals = json_decode($_POST['json_data'], true);

	foreach ($insert_vals as $row) {
		$rollno = $row['rollno'];
		$fname = $row['fname'];
		$lname = $row['lname'];
		$email = $row['email'];
		$sql = "INSERT INTO stud_data VALUES ($rollno, '$fname', '$lname', '$email');";
		mysqli_query($conn, $sql);
	}
	header('Location: /student/');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Json add</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="form-group container-fluid" style="width: 50%; margin-top: 20px;">
	<form method="post">
		<textarea class="form-control" name="json_data" rows="5"></textarea>
		<br>
		<input type="submit" name="submit" class="btn btn-primary">
		<button type="button" class="btn btn-default">
			<a href="/student/">Back</a>
		</button>
	</form>
</div>
</body>
</html>