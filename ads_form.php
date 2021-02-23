<?php
	session_start();

	if (isset($_SESSION['s_username']) && $_SESSION['logged'] == true)
		include("header_admin.html");
	else
        header("Location: login.html");

    $pic = "noimage.png";
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Trade - เพิ่มโฆษณา</title>
    <link rel="stylesheet" href="edit_form.css">
</head>

<body>

        <form action="add_ads.php" method="post" enctype = "multipart/form-data">
            <table align="center">
                <tr>
                    <td width="50%">

                        <table align="center">
                            <tr>
                                <td> <label for="date">วันแสดงโฆษณา</label> </td>
                                <td> <input type="date" id="date" name="date" required> </td>
                            </tr>
                            <tr>
                                <td> <br /><label for="aImage">รูปโฆษณา</label> </td>
                                <td> <br /><br /><input type="file" id="aImage" name="aImage" onchange="preview()" required><br /><br /> </td>
                            </tr>
                        </table>

                    </td>
                    <td>

                        <table align="center">
                            <tr align="center">
                                <script type="text/javascript">
                                    function preview() {
                                        frame.src=URL.createObjectURL(event.target.files[0]);
                                    }
                                </script>

                                <td></td>
                                <td> <img id="frame" src="resource/<?php echo $pic; ?>" height="350px"/> </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>   

            <table align="center">
                <tr align="center">
                    <td>
                        <br /><br />
                        <input type="submit" value="บันทึก">
                        <input type="hidden" name="hide" value="ซ่อน">
                    </td>
                </tr>
            </table>
        </form>

     
</body>
</html>