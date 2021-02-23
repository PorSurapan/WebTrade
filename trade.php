<?php
    session_start();

    $status = $_POST['status'];
    if ($status == "--โปรดเลือก--")
        header("location:javascript://history.go(-1)");


    $uid = $_SESSION['s_id'];
    $own = $_POST['owner'];

    $product = $_POST['prodID'];
    // $status = $_POST['status'];
    //echo $status;

	$con = new mysqli("localhost", "root", "","trader");	
	$sql1 = "INSERT INTO trade (sender,receiver,product)
			VALUES('"  . $uid . "', '" . $own . "', '" . $product . "')";
    $con->query($sql1);

    if($status == "ยอมรับ") {
        $sql2 = "UPDATE products SET status = 'เทรดแล้ว' WHERE id = '$product'";
        $con->query($sql2);

        $sql3 = "UPDATE exchange SET status = '$status' WHERE product = '$product'";
        $con->query($sql3);
    } else {
        $sql4 = "UPDATE exchange SET status = '$status' WHERE product = '$product'";
        $con->query($sql4);

        $sql5 = "UPDATE products SET status = 'รอเทรด' WHERE id = '$product'";
        $con->query($sql5);
    }

    echo '<script type="text/javascript">';
    echo 'if(!alert("เทรดสินค้าแล้ว!")) document.location = "list_request.php";';
    echo '</script>';
    
    $con->close();	
?>