<?php
include("../function/condb.php");
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>index.php</title>
	<style>
		body {
			margin: 0px;
		}

		a {
			text-decoration: none;
			font-family: 微軟正黑體, 新細明體, 標楷體;
			font-weight: bold;
			font-size: 17px;
		}

		.menu {
			position: fixed;
			width: 100%;
			height: 40px;
			background-color: dimgrey;
			z-index: 9999999;
		}

		.menu a {
			text-decoration: none;
			color: white;
			font-family: 微軟正黑體, 新細明體, 標楷體;
			font-weight: bold;
			font-size: 17px;
		}

		.menu_css {
			float: left;
			width: 100%;
			height: inherit;
			overflow: hidden;
			font-family: 微軟正黑體, 新細明體, 標楷體;
			font-weight: bold;
			font-size: 17px;
			color: white;
			border-spacing: 0px;
		}

		.menu_css tr {
			display: block;
		}

		.menu_css td {
			height: 40px;
			padding: 0px 15px 0px 15px;
			white-space: nowrap;
		}

		.menu_css td:hover {
			background-color: black;
		}

	

		.inner_content {
			padding: 50px 130px 220px 130px;
		}

		.inner_content table {
			background-color: white;
		}

		li img {
			width: 100%;
			height: 100%;
		}

		input[type=text] {
			color: black;
		}

		form {
			margin-bottom: 0em;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<link href="css/jquery.bxslider.min.css" rel="stylesheet" />
	<script>
		$(document).ready(function() {
			slider = $('.bxslider').bxSlider({
				pagerCustom: '#bx-pager'
			});
			slider.startAuto();
		});
	</script>

	<script type="text/javascript">
		var $theid = 1

		function addrow($id) {
			var $idname = "#" + $id;
			$theid += 1;
			$($idname).append('<tr id="' + $theid + '"> ' +
				'<th></th>' +
				'<td><input type="text" id="book_Price" name="book_Price[]" value=""/></td> ' +
				'<td><input type="text" id="book_Amount" name="book_Amount[]" value=""/></td>' +
				'<td><input type="text" id="book_Name" name="book_Name[]" value=""/></td> ' +
				'<td><input type="text" id="book_Description" name="book_Description[]" value=""/></td>' +
				'<td><input type="text" id="book_Type" name="book_Type[]" value=""/></td>' +
				'<td><input type="text" id="img_url" name="img_url[]" value=""/></td>' +
				'</tr>');


		}

		function delrow() {
			if ($theid > 1) {

				var $idname = "#" + $theid;
				$($idname).remove();
				$theid -= 1;
			}


		}
		//   $("a[id='del_file[]']").click(function(){
		//       if (confirm('確定刪除檔案')) {
		//         return true;
		//       }
		//       return false;
		//   });    
	</script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a id='title' class="navbar-brand" href="../index.php">BookStore Manage System</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link " href="../index.php">首頁 </a>
				<a class="nav-item nav-link active" href="bookstore.php">返回書店<span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link active" href="book.php?bookstore_id=<?php echo $_GET["bookstore_id"] ?>">編輯書店<span class="sr-only">(current)</span></a>
			</div>
		</div>
	</nav>
	<form method="get" action="book_addsave.php" enctype="multipart/form-data">
		<div class="content">
			<div class="inner_content">
				<div class="btn-group mb-3 " role="group" aria-label="Basic example">
					<input class="btn btn-primary"  type="button" id="add_button" name="add_button" onclick="addrow('add_file_button')" value="增加附加欄位">
					<input class="btn btn-primary" type="button" id="add_button" name="add_button" onclick="delrow()" value="減少附加欄位">
					<button class="btn btn-primary" type="submit" name="bookstore_id" value="<?php echo $_GET["bookstore_id"] ?>">點我新增</button>
				</div>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>book價錢</th>
							<th>book數量</th>
							<th>book名稱</th>
							<th>book描述</th>
							<th>book種類</th>
							<th>封面</th>
						</tr>
					</thead>
					<tbody id="add_file_button">
						<tr id="1">
							<th></th>
							<td><input class="form-control" type="text" id="book_Price" name="book_Price[]" value="" /></td>
							<td><input class="form-control" type="text" id="book_Amount" name="book_Amount[]" value="" /></td>
							<td><input class="form-control" type="text" id="book_Name" name="book_Name[]" value="" /></td>
							<td><input class="form-control" type="text" id="book_Description" name="book_Description[]" value="" /></td>
							<td><input class="form-control" type="text" id="book_Type" name="book_Type[]" value="" /></td>
							<td><input class="form-control" type="text" id="img_url" name="img_url[]" value="" /></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</form>
</body>

</html>