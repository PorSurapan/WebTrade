<?php
    session_start();

    $own = $_POST['pOwn'];
    $proID = $_POST['proID'];
    $pID = $_POST['pID'];
    $status = $_POST['status'];
    $product = $_POST['product'];
    // $status = $_POST['status'];
    
    
	$con = new mysqli("localhost", "root", "","trader");	

	$sql1 = "INSERT INTO trade (sender,receiver,product)
			VALUES('"  . $proID . "', '" . $own . "', '" . $pID . "')";

    $sql2 = "UPDATE products SET status = 'เทรดแล้ว'
                                  WHERE id = '$product'";

    $sql3 = "UPDATE exchange SET status = '$status'
                                    WHERE product = '$product'";

         //echo $status;
    
    if(($con->query($sql1))&&($con->query($sql2))&&($con->query($sql3)))
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