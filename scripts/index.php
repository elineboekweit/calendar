<?php 
    $info = cal_info(0); 
    $months = $info['months'];
    $days = $info['maxdaysinmonth'];
    require "connection.php";
    if (mysqli_connect_errno()) {
        echo "failed to connect";
    }

    if (isset($_GET['delete']) and isset($_GET['id'])) {
        $delete = $_GET['delete'];
        $id = $_GET['id'];
    } else {
        $delete = null;
        $id = null;
    }

   if ($delete) {
        mysqli_query($conn, "DELETE FROM birthdays WHERE id = '$id'");
    }

    $sql = "SELECT * FROM birthdays ORDER BY month, day";
    $result = mysqli_query($conn, $sql);
    $output = mysqli_fetch_all($result);
    
?> 
<!doctype html>
<html>
<?php   require 'head.php'; ?>
	<body>
    <header>
        <a href="../../links/links.php"><img src="../../images/pijl.png"></a>
        <img id="birthday" src="../images/birthday.png">
    </header>

        <a href="add.php">add</a>  <br> 
    <?php 
        $counter = 0; 
        foreach ($months as $month) {
            echo "<br><h2>$month</h2>";
            $counter++;
            $month = $counter;
            foreach ($output as $data) { 
                if ($month == $data['3']){  
    ?>
                    <a href="edit.php?month=<?=$data['3']?>&id=<?=$data['0']?>">
    <?php
                        echo   $data['1'] . " " . $data['2'] . "-" . 
                            $data['3'] . "-" . $data['4'];
    ?>
                    </a>
                    <a href="index.php?delete=true&id=<?=$data['0']?>">delete</a><br>
    <?php   
                }
            }
        }

       
    ?>
	</body>
</html>