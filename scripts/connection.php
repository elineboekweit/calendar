<?php
//$conn = mysqli_connect("localhost","boekweit_admin","JN97vvXXoo","boekweit_database");
$conn = mysqli_connect("localhost", "root", "", "calendar");

if (mysqli_connect_errno()) {	
	   echo "Failed to connect to MySQL";
	   }
?>