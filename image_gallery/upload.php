<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "image_gallery";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
	die("connection failed: ".mysqli_connect_error());

$target_dir = "img/";
$target_file = $target_dir.basename($_FILES["img-upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$insrt_sql = "insert into img_paths (path) values ('$target_file');";
echo "<br>";
echo $insrt_sql;
echo $target_file;
if (isset($_POST['submit']))
{
	echo "in";
	$check = getimagesize($_FILES["img-upload"]["tmp_name"]);
	if($check != false)
	{
		$uploadOk = 1;
		if (move_uploaded_file($_FILES["img-upload"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["img-upload"]["name"]). " has been uploaded.";
      mysqli_query($conn, $insrt_sql);
		}
	}
		else
			$uploadOk = 0;
}
?>
