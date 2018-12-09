<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "image_gallery";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
	die("connection failed: ".mysqli_connect_error());

$sql = "select * from img_paths";
$result = mysqli_query($conn, $sql);
$n = mysqli_num_rows($result);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Image gallery</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
	<h2>Image gallery</h2>
	<form method="post" enctype="multipart/form-data" action="upload.php">
		<label for="img-upload">Upload new image</label>
		<input type="file" name="img-upload">
		<br>
		<input type="submit" name="submit">
	</form>
	<br>
	<div class="container-fluid">
	<?php while ($n > 0) { 
		$x = 3;
		?>
			<div class="row">
			<?php while ($n > 0 && $x > 0) { 
					$row = mysqli_fetch_assoc($result);
				?>
				<div class="col-12 col-md-4">
					<img class="img-thumbnail" src="<?php echo $row['path'] ?>" width="95%" alt="<?php echo $row['id'] ?>">
				</div>
			<?php 
			$n--;
			$x--;
			 } ?>
			</div>
	<?php } ?>
	</div>
</body>
</html>