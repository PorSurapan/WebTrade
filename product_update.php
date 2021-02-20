<?php
    session_start();
    
    $id = $_POST['pID'];
    $owner = $_POST['pOwn'];
    $name = $_POST['productName'];
    $describe = $_POST['description'];
    $cate = $_POST['category'];
    $pic = $_FILES['productImage']['name'];
    $status = $_POST['status'];
    $hide = $_POST['hide'];

    if ($pic != null || $pic != "")
    {
        $conn=new mysqli("localhost", "root", "", "trader");
        $sql="UPDATE products SET name = '$name', 
                                    description = '$describe', 
                                    category = '$cate', 
                                    picture = '$pic', 
                                    status = '$status', 
                                    hide = '$hide' 
                                    WHERE id = '$id'";

        // echo $sql; //print out for debugging

        if ($conn->query($sql))
        {
            if (file_exists("resource/" . $_FILES["productImage"]["name"])){
                echo $_FILES["productImage"]["name"] . " Already exists. <br />";
            } else {
                move_uploaded_file($_FILES["productImage"]["tmp_name"], "resource/" . $_FILES["productImage"]["name"]);
            }

            echo '<script type="text/javascript">';
            echo 'if(!alert("อัพเดตข้อมูลแล้ว!")) document.location = "main.php";';
            echo '</script>';
        }
        else
        {
            echo "Execution Error!";
        }
        $conn->close();
    }
    else
    {
        $conn=new mysqli("localhost", "root", "", "trader");
        $sql="UPDATE products SET name = '$name', 
                                    description = '$describe', 
                                    category = '$cate', 
                                    status = '$status', 
                                    hide = '$hide' 
                                    WHERE id = '$id'";

        // echo $sql; //print out for debugging

        if ($conn->query($sql))
        {
            echo '<script type="text/javascript">';
            echo 'if(!alert("อัพเดตข้อมูลแล้ว!")) document.location = "main.php";';
            echo '</script>';
        }
        else
        {
            echo "Execution Error!";
        }
        $conn->close();
    }
?>