<?php

   	$string = $_POST['name'];
	$codeblock = strip_tags($string);

	$hour = date ("H:i");
	$timezone = date("d M Y");

	require "connection.php";

	if (isset($_POST['name'], $_POST['day'], $_POST['month'], $_POST['year'])) {
		$name = $codeblock;
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];

		$sql = "INSERT INTO birthdays (person, day, month, year, hour, datum) 
		    VALUES ('$name', '$day', '$month', '$year', '$hour', '$timezone')"; 
		$result = mysqli_query($conn, $sql);
	}
?>
<!DOCTYPE html>
<html>
<?php   require 'head.php'; ?>
<body id="add">
<header>
	<img id="fireplace" src="../images/fireplace3.gif">
</header>

<?php
	$option = isset($name) && $day != "---Day---" && $month != "---Month---" && $year != "---Year---"? $name : null;
	if ($option) {
		echo "<h1> Confirmed</h1><br>" . $name . " " . $_POST['day'] . "-" . 
		$_POST['month'] . "-" . $_POST['year'] . " is added to the calendar.<br><br>";
		header('Refresh: 5;url=index.php');
		echo "You wil be redirected to the main page in 5 seconds.";
		echo ' <a href="index.php"><button>Go back now.</button></a>';	
	} 
	else {
		echo "requirement is not met";
		header('Refresh: 3;url=add.php');
	}
?>
</body>
</html>