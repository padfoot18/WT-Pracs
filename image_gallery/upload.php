<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "img_gallery";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) 
	exit();

$target_dir = "img/";
$target_file = $target_dir.basename($_FILES["img-upload"]["name"]);
$flag = 1;
$imgfiletype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$sql = "insert into img_path (path) values ('$target_file');";

if(isset($_POST["submit"]))
{
	echo "submitted<br>";
	$check = getimagesize($_FILES["img-upload"]["tmp_name"]);
	if($check !== false)
	{
		echo "file ok<br>";
		if($imgfiletype == "jpg" || $imgfiletype == "png" || $imgfiletype == "jpeg" || $imgfiletype == "gif")
		{
			echo "image file<br>";
			if(!file_exists($target_file))
			{
				echo "new file<br>";
				move_uploaded_file($_FILES["img-upload"]["tmp_name"], $target_file);
				mysqli_query($conn, $sql);
			}
		}
	}
}

header("Location: /img_gallery/index.php");
exit();
?>
