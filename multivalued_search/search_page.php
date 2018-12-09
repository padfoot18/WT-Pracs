<?php
include 'db_conn.php';
$sql = "SELECT * FROM person_data";
if (isset($_GET['submit']))
	if (isset($_GET['search_by'])){
		$sql = "SELECT * FROM person_data WHERE ";
		$x = sizeof($_GET['search_by']);
		if($x === 4)
			$sql = "SELECT * FROM person_data";
		else
		{
			for ($i=0; $i < $x; $i++) { 
				if ($i === 0)
					$sql = $sql." country='".$_GET['search_by'][$i]."'";
				else
					$sql = $sql." or country='".$_GET['search_by'][$i]."'";
			}		
		}
		$sql = $sql.";";
	}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
	<h2>Search by</h2>
	<form method="get">
		<div class="form-check">
			<input type="checkbox" name="search_by[]" value="ind" class="form-check-input">
			<label class="form-check-label" for="ind">India</label>
		</div>
		<div class="form-check">
			<input type="checkbox" name="search_by[]" value="usa" class="form-check-input">
			<label class="form-check-label" for="usa">USA</label>
		</div>
		<div class="form-check">
			<input type="checkbox" name="search_by[]" value="uk" class="form-check-input">
			<label class="form-check-label" for="uk">UK</label>
		</div>
		<div class="form-check">
			<input type="checkbox" name="search_by[]" value="ger" value="ger" class="form-check-input">
			<label class="form-check-label" for="ger">Germany</label>
		</div>
		<input type="submit" name="submit" class="btn btn-primary">
		<button class="btn btn-default">
			<a href="/mult-search/">Add New</a>
		</button>
	</form>

	<div class="container-fluid" style="margin-top: 20px;">
		<table class="table table-hover">
			<tr>
				<th>Name</th>
				<th>Country</th>
				<th>Gender</th>
			</tr>
			<?php
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['country']."</td>";
				echo "<td>".$row['gender']."</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div>
</div>
</body>
</html>