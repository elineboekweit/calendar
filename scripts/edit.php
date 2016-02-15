<?php 
	require "connection.php";

	$id = $_GET['id'];
	
	$sql = "SELECT * FROM birthdays WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	$output = mysqli_fetch_all($result);

	
	$oldname = $output[0][1];
	$oldday = $output[0][2];
	$oldmonth = $output[0][3];
	$oldyear = $output[0][4];
	$info = cal_info(0); 
	$months = $info['months'];
	$montha = $months[$_GET['month']];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link  rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body id="add">
<?php   require 'head.php'; ?>
<header>
	<img id="fireplace" src="../images/fireplace3.gif">
</header>
<h1>Change</h1>
	<form action="confirmedit.php?id=<?=$id?>&rewrite=true" method="post">
		Name:
		<input type="text" name="name" placeholder="<?=$output[0][1]?>">
		<br>
		
		Date:
		<select name="day">
			<option disabled selected style="display:none" name="select"><?=$output[0][2]?></option>
		<?php
			for ($i=1; $i <= 31; $i++) { 
				echo "<option value='$i'>$i</option>";
			}
		?>
		</select>

		<select name="month">
			<option disabled selected style="display" name="select"><?=$montha?></option>
		<?php
			$c = 1;
			foreach ($months as $month) {
				echo "<option value='$c'>$month</option>";
				$c++;
			}
		?>
		</select>

		<select name="year">
			<option disabled selected style="display:none" name="select"><?=$output[0][4]?></option>
		<?php
			for ($i=0; $i <= 60 ; $i++) { 
				$year = strtotime(sprintf('-%d years', $i));
				$value = date('Y', $year);
				printf('<option value="%s">%s</option>', $value, $value);
			}
		?>
		</select>

		<input type="hidden" name="oldname" value="<?=$oldname?>">
		<input type="hidden" name="oldday" value="<?=$oldday?>">
		<input type="hidden" name="oldmonth" value="<?=$oldmonth?>">
		<input type="hidden" name="oldyear" value="<?=$oldyear?>">
		<br>
		<input type="submit" value="change">
	</form>
</body>
</html>