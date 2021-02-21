<?php
    session_start();

    $own = $_POST['pOwn'];
    $proID = $_POST['proID'];
    $pID = $_POST['pID'];
    
	$con = new mysqli("localhost", "root", "","trader");
	
	$sql = "INSERT INTO trade (sender,receiver,product)
			VALUES('"  . $own . "', '" . $proID . "', '" . $pID . "')";

        echo $sql;
    
    if($con->query($sql))
    {
        echo '<script type="text/javascript">';
        echo 'if(!alert("เทรดสินค้าแล้ว!")) document.location = "home.php";';
        echo '</script>';
    }
    else
    {
        echo "error";
    }
    $con->close();
			
?>