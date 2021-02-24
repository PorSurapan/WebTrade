<html>
<body>
    <?php
    session_start();
    
    $id = $_GET["id"];
    $conn=mysqli_connect("localhost", "root", "","trader");

    $sql="DELETE FROM products WHERE id = $id";

    if ($conn->query($sql)) {
        header("Location: profile_sender.php");
    } else {
    echo "Execution Error!";
    }

    $conn->close();
    
    echo "<br /><br />";
    echo "<a href = profile_sender.php>ย้อนกลับ</a>";

    ?>
</body>
</html>
