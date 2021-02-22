<?php
    session_start();
    
    $date = $_POST['date'];
    $pic = $_FILES['aImage']["name"];
    $hide = $_POST['hide'];

    $conn = new mysqli("localhost", "root", "", "trader");
    $sql = "SELECT date FROM advertising ORDER BY id DESC";
    $rs = $conn->query($sql);

    $check = 0;
    while($row = $rs->fetch_assoc()) {
        if ($row['date'] == $date) {
            $check = 1;
            echo '<script type="text/javascript">';
            echo 'if(!alert("วันที่เลือก มีผู้ลงโฆษณาไว้แล้ว โปรดเลือกวันอื่น!")) document.location = "ads_form.php";';
            echo '</script>';
        }
    }

    if ($check == 0) {
        $sql = "INSERT INTO advertising (picture, hide, date) 
                VALUES ('" . $pic . "', '" . $hide . "', '" . $date . "')";

        // echo $sql; //print out for debugging

        if ($conn->query($sql))
        {
            if (file_exists("resource/" . $_FILES["aImage"]["name"])){
                echo $_FILES["aImage"]["name"] . " Already exists. <br />";
            } else {
                move_uploaded_file($_FILES["aImage"]["tmp_name"], "resource/" . $_FILES["aImage"]["name"]);
            }

            echo '<script type="text/javascript">';
            echo 'if(!alert("เพิ่มข้อมูลแล้ว!")) document.location = "main_ads.php";';
            echo '</script>';
        }
        else
        {
            echo "Execution Error!";
        }
        $conn->close();
    }
?>