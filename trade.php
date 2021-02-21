<?php
    session_start();

    $own = $_POST['pOwn'];
    $proID = $_POST['proID'];
    
	$con = new mysqli("localhost", "root", "","trader");
	
	$sql = "INSERT INTO trade (sender,receiver)
			VALUES('"  . $own . "', '" . $proID . "')";

        echo $sql;
    
    if($con->query($sql))
    {
         header("Location: home.php");
    }
    else
    {
        echo "error";
    }
    $con->close();
			
?>