<?php 
include 'db_conn.php';
if (isset($_GET['submit'])) {
	$sort_by = $_GET['sort_by'];
	$order_by = $_GET['order_by'];
}
else
{
	$sort_by="rollno";
	$order_by="ASC";
}
$sql = "SELECT * from stud_data ORDER BY $sort_by $order_by;";
$result = mysqli_query($conn, $sql);
$json_db = [];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student data</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
	<button type="button"><a href="addnew.php">Add New</a></button>
	
	<button type="button"><a href="json_add.php">JSON add</a></button>
	<br><br>
	<div class="form-action">
	<form method="get">
		<label for="sort_by">Sort by:</label><br>
		<select name="sort_by">
			<option value="rollno">Roll no</option>
			<option value="fname">First name</option>
			<option value="lname">Last name</option>
		</select>
		<br>
		<label for="order_by">Order by:</label><br>
		<input type="radio" name="order_by" value="ASC" id="ASC"
		<?php if (isset($_GET['order_by']) && $_GET['order_by'] === "ASC")
						echo "checked";
		 ?>
		>
		<label for="ASC">Ascending</label>
		<input type="radio" name="order_by" value="DESC" id="DESC"
		<?php if (isset($_GET['order_by']) && $_GET['order_by'] === "DESC")
						echo "checked";
		 ?>>
		<label for="DESC">Descending</label>
		<br>
		<input type="submit" name="submit">
	</form>
	</div>
	<div class="container-fluid" style="margin-top: 15px">
		<table class="table table-hover">
			<tr>
				<th>Roll no</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Delete</th>
			</tr>
			<?php 
			$n = mysqli_num_rows($result);
			while ($n > 0) {
				$row = mysqli_fetch_assoc($result);
				$json_db[] = $row;
				echo "<tr>";
				echo "<td>".$row['rollno']."</td>";
				echo "<td>".$row['fname']."</td>";
				echo "<td>".$row['lname']."</td>";
				echo '<td><button class="btn btn-danger"><a style="color:white;" href="delete.php?rollno='.$row['rollno'].'">Delete</a></button></td>';
				echo "</tr>";
				$n--;
			}
			 ?>
		</table>
		<div class="container-fluid" style="margin: 20px;">
			<p><?php echo json_encode($json_db); ?></p>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
