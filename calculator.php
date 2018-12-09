<?php 
session_start();
if (isset($_GET['no1']) && isset($_GET['no2']) && isset($_GET['operation'])) {
	if($_GET['no1'] != "" && $_GET['no2'] != "" && $_GET['operation'] != "")
	{
		$_SESSION['a'] = $_GET['no1'];
		$_SESSION['b'] = $_GET['no2'];
		$a = $_GET['no1'];
		$b = $_GET['no2'];
		$op = $_GET['operation'];

		if($op == '+')
			$_SESSION['result'] = intval($a) + intval($b);
		else if($op == '-')
			$_SESSION['result'] = intval($a) - intval($b);
		else if($op == '*')
			$_SESSION['result'] = intval($a) * intval($b);
		else if($op == '/')
			$_SESSION['result'] = intval($a) / intval($b);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
</head>
<body>
<form method="get">
	<label for="result">Result:</label>
	<input type="text" name="result" id="result" readonly value="<?php if(isset($_SESSION['result'])) echo $_SESSION['result'] ?>">
	<br><br>
	<label for="no1">a:</label>
	<input type="text" name="no1" id="no1" value="<?php if(isset($_SESSION['a'])) echo $_SESSION['a'] ?>">
	<br><br>
	<label for="no2">b:</label>
	<input type="text" name="no2" id="no2" value="<?php if(isset($_SESSION['b'])) echo $_SESSION['b'] ?>">
	<br><br>
	<input type="radio" name="operation" value="+">+<br>
	<input type="radio" name="operation" value="-">-<br>
	<input type="radio" name="operation" value="*">*<br>
	<input type="radio" name="operation" value="/">/<br>
	<button type="submit">=</button>
</form>

<button onclick="clearNos()">clear</button>

<script type="text/javascript">
	function clearNos() {
		document.getElementById("no1").value="";
		document.getElementById("no2").value="";
		document.getElementById("result").value="";
	}
</script>
</body>
</html>
