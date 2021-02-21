<?php
    session_start();

    $own = $_POST['pOwn'];
    $proID = $_POST['proID'];
    $pID = $_POST['pID'];
    // $status = $_POST['status'];
    
    
	$con = new mysqli("localhost", "root", "","trader");	

	$sql1 = "INSERT INTO trade (sender,receiver,product)
			VALUES('"  . $own . "', '" . $proID . "', '" . $pID . "')";

    $sql2 = "UPDATE products SET status = 'เทรดแล้ว'
                                  WHERE id = '$pID'";

        // echo $sql;
    
    if(($con->query($sql1))&&($con->query($sql2)))
    {
        echo '<script type="text/javascript">';
        echo 'if(!alert("เทรดสินค้าแล้ว!")) document.location = "home.php";';
        echo '</script>';
    }
    else{
        echo "error";
    }
    $con->close();
			
?>