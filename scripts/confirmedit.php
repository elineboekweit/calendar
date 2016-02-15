<?php 
    require "connection.php";

    $name = $_POST['name'];
    $codeblock = strip_tags($name);

    $hour = date ("H:i");
    $timezone = date("d M Y");

    if (isset($_GET['update']) and isset($_GET['id'])) {
            $update = $_GET['update'];
            $id = $_GET['id'];
        } else {
            $update = '';
            $id = '';
    }

    $id = $_GET['id'];
    $person = $codeblock != '' ? $codeblock : $_POST['oldname'];
    $day = isset($_POST['day']) ?  $_POST['day'] : $_POST['oldday'];
    $month = isset($_POST['month']) ? $_POST['month'] : $_POST['oldmonth'];
    $year = isset($_POST['year']) ? $_POST['year'] : $_POST['oldyear'];

    if (isset($_GET['rewrite'])) {
        $sql = "UPDATE birthdays SET person = '$person', day = '$day', month = '$month', year = '$year', hour = '$hour', datum = '$timezone' WHERE id = '$id'";
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
<h1>Changed</h1>
<?php
    echo $person . " " . $day . "-" . 
        $month . "-" . $year . " is edited in the calendar.<br>";
    header('Refresh: 5;url=index.php');
    echo "You wil be redirected to the main page in 5 seconds.";
    echo ' <a href="index.php"><button>Go back now.<?button</a>';   
?>
</body>
</html>
