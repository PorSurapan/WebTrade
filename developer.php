<?php
	session_start();
	include("config_header.php");

	if (!isset($_SESSION['views'])) { 
		$_SESSION['views'] = 0;
	}
	
	$_SESSION['views'] = $_SESSION['views'] + 1;
	$session = $_SESSION['views'];
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trade - ผู้พัฒนา</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>
  </head>
<body>

<table class="table"
      id="table"
      data-toggle="table"
      data-toolbar="#toolbar"
      data-search="true"
      data-card-view="true"
      data-show-columns-toggle-all="true"
      data-show-columns="true"
      data-page-list="[5, 10, 20, 100]"
      data-pagination="true"
      data-pagination-pre-text="Previous"
      data-pagination-next-text="Next"
      data-page-size="5"
      data-url="http://localhost:3000/dev">
<thead class="thead-dark">

<tbody>
  <tr>
    <th data-field="sid">รหัส</th>
    <th data-field="name">ชื่อ</th>
    <th data-field="lastname">นามสกุล</th>
    <th data-field="major">สำนัก</th>
  </tr>
  <tr>
    <td data-field="sid"></td>
    <td data-field="name"></td>
    <td data-field="lastname"></td>
    <td data-field="major"></td>
  </tr>
</table>
<script type="text/javascript" src="dev_db.js"></script>
<a href="http://localhost:3000/dev">BTN</a>
</body>
</html>