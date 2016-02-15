<?php 
	$info = cal_info(0); 
	$months = $info['months'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add</title>
	<link  rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body id="add">
<?php   require 'head.php'; ?>
<header>
	<img id="fireplace" src="../images/fireplace3.gif">
</header>
	<h1>New birthday</h1>
	<form action="confirm.php" method="post">
		Name:
		<input type="text" name="name" placeholder="insert name here">
		<br>

		Date:
		<select name="day">
			<option disabled selected name="select">---Day---</option>
		<?php
			for ($i=1; $i <= 31; $i++) { 
				echo "<option value='$i'>$i</option>";
			}
		?>
		</select>

		<select name="month">
			<option disabled selected name="select">---Month---</option>
		<?php
			$c = 1;
			foreach ($months as $month) {
				echo "<option value='$c'>$month</option>";
				$c++;
			}
		?>
		</select>

		<select name="year">
			<option disabled selected name="select">---Year---</option>
		<?php
			for ($i=0; $i <= 60 ; $i++) { 
				$year = strtotime(sprintf('-%d years', $i));
				$value = date('Y', $year);
				printf('<option value="%s">%s</option>', $value, $value);
			}
		?>
		</select>
		
		<br>
		<input type="submit" value="Add">
	</form>
</body>
</html>