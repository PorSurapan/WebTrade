<html>
<body>
<?php
$id = $_GET["id"];
$conn=mysqli_connect("localhost", "root", "","trader");

$sql="DELETE FROM products WHERE id = $id";

if ($conn->query($sql)) {
    header("Location: profile.php");
} else {
echo "Execution Error!";
}

$conn->close();
 
echo "<br /><br />";
echo "<a href = profile.php>ย้อนกลับ</a>";

?>
</body>
</html>
