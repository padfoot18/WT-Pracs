<!DOCTYPE html>
<html>
<head>
	<title>Multivalued Search</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
	<div class="form-group" style="width: 50%; margin: auto; margin-top: 20px;">
		<form method="post" action="addnew.php">
			<label for="name">Name</label>
			<input class="form-control" type="text" name="name" id="name">
			<label for="country">Country</label>
			<select name="country" class="form-control">
				<option value="ind">India</option>
				<option value="usa">USA</option>
				<option value="uk">UK</option>
				<option value="ger">Germany</option>
			</select>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="gender" value="male" id="male" checked>
				<label for="male" class="form-check-label">Male</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="gender" value="female" id="female">
				<label for="female" class="form-check-label">Female</label>
			</div>
			<input type="submit" name="submit" class="btn btn-default">
			<button type="button" class="btn btn-primary"><a href="search_page.php" style="color: white">Search</a></button>
			</div>
		</form>
	</div>
</div>
</body>
</html>
