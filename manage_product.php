<?php
	session_start();

	if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
		include("header_admin.html");
	else
		//go to login
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - จัดการสินค้า</title>
    <link rel="stylesheet" href="edit_form.css">
    <link rel="stylesheet" href="show_product.css">
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

    <form class="form-style-9">
        <ul>
            <li>
                <input type="text" name="field1" class="field-style field-split align-left" placeholder="Name" />
                <input type="email" name="field2" class="field-style field-split align-right" placeholder="Email" />

            </li>
            <li>
                <input type="text" name="field3" class="field-style field-split align-left" placeholder="Phone" />
                <input type="url" name="field4" class="field-style field-split align-right" placeholder="Website" />
            </li>
            <li>
            <input type="text" name="field3" class="field-style field-full align-none" placeholder="Subject" />
            </li>
            <li>
            <textarea name="field5" class="field-style" placeholder="Message"></textarea>
            </li>
            <li>
            <input type="submit" value="Send Message" />
            </li>
        </ul>
    </form>

</body>
</html>