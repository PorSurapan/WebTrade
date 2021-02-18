<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - สินค้าเทรด</title>
    <link rel="stylesheet" href="show_product.css">
</head>
<body>


        <!-- // echo "<table border='1' cellpadding='10' width=80%>";
        // echo "<tr>
        //     <th>ID</th>
        //     <th>First Name</th>
        //     <th>Last Name</th>
        //     <th>Age</th>
        //     <th>Gender</th>
        //     <th></th>
        //     </tr>";


        // echo "<tr>";
        // echo '<td>' . $row['ID'] . '</td>';
        // echo '<td>' . $row['FirstName'] . '</td>';
        // echo '<td>' . $row['LastName'] . '</td>';
        // echo '<td>' . $row['Age'] . '</td>';
        // echo '<td>' . $row['Gender'] . '</td>';
        // echo '<td><a href="editForm.php?id=' . $row['ID'] . '">Edit</a> ';
        // echo '<a href="delete.php?id=' . $row['ID'] . '">Delete</a></td>';
        // echo "</tr>";
        
        // echo "</table>"; -->
        <?php 
            $row = 24;
            $i = 0;
        ?>

        <table align="center">
            <tr>
                <?php
                    while($i <= $row) {
                        if ($i % 5 == 0) {
                            echo "</tr>";
                            echo "<tr>";
                        }

                        echo "<td>";
                        echo "<div class='card'>";
                        echo "<img src='resource/shoe1.jpg' style='width:100%'>";
                        echo "<h2>ชื่อ</h2>";
                        echo "<p>ประเภท</p>";
                        echo "<p class='price'>สถานะ</p>";
                        echo "<p><button>เทรด</button></p>";
                        echo "</div>";
                        echo "</td>";

                        $i++;
                    }
                ?>
        
        </table>
</body>
</html>