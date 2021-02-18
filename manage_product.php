<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - จัดการสินค้า</title>
</head>
<body>
    <?php
        $id = $_GET['id'];

        // echo $id;

        $conn = new mysqli("localhost", "root", "", "trader");
        $sql = "SELECT * FROM products WHERE id = $id";

        // echo $sql; //print out for debugging

        if ($conn->query($sql))
        {
            echo "Insertion Successfully!";
            echo "<br /><a href='view.php'>Go to Home</a>";
        }
        else
        {
            echo "Execution Error!";
        }
        $conn->close();
    ?>

</body>
</html>