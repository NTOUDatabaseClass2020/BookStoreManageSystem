<?php
include("../function/condb.php");
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>bookstore.php</title>
	<style>
		body {
			margin: 0px;
		}

		a {
			text-decoration: none;
			color: white;
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

		.content {
			position: relative;
			word-wrap: break-word;
			width: 100%;
			top: 40px;
		}


		.inner_content {
			padding: 50px 130px 220px 130px;
		}

		#title {
			margin-left: 40px;
		}

		.bimg {
			max-width: 100px;
			max-height: 100px;
		}

		li img {
			width: 100%;
			height: 100%;
		}
	</style>
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
				<a class="nav-item nav-link active" href="bookstore.php">書店<span class="sr-only">(current)</span></a>
			</div>
		</div>
	</nav>
	<div class="content">
		<div class="inner_content">
			<tr>
				<td>Search</td>
				<form method="post" action="bookstore.php">
				<div class="input-group mb-3">
					<input type="text" id="keyword" class="form-control" name="keyword" value="" placeholder="輸入搜尋關鍵字">
					<button class="btn btn-outline-secondary" type="submit" id="button-addon2">送出</button>
				</div>
				</form>
			</tr>
			<form action="bookstore_add.php" method="get">
				<div style="text-align: left;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 15px;font-weight: bold;">
					總數量為:
					<?php
					$sql = "SELECT COUNT(*) FROM bookstores";
					$stmt =  $db->prepare($sql);
					$error = $stmt->execute();

					if ($rowcount = $stmt->fetchColumn())
						echo $rowcount;
					?>
				</div>
				<table class="table table-bordered table-striped">
					<input type="submit" value="新增" class="btn btn-primary mb-3">

					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>書店名稱</th>
							<th>地址</th>
							<th>電話</th>
							<th>營業時間</th>
							<th>圖片</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_POST["keyword"])) {
							$keyword = $_POST["keyword"];
							if ($keyword == '') {
								$keyword = '%';
							} else {
								$keyword = '%' . $keyword . '%';
							}
							$sql = "SELECT t.id,t.name,t.address,t.phone,t.business_hour,t.img_url FROM `bookstores` t where (t.name like ?)";
							if ($stmt = $db->prepare($sql)) {
								$stmt->execute(array($keyword));
								for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++) {
						?>
									<tr>
										<th scope="row"><?php echo $count; ?></th>
										<td><?php echo $rows[$count]['id']; ?></td>
										<td><a href="../content/book.php?bookstore_id=<?php echo $rows[$count]['id']; ?>"><?php echo $rows[$count]['name']; ?></a></td>
										<td><?php echo $rows[$count]['address']; ?></td>
										<td><?php echo $rows[$count]['phone']; ?></td>
										<td><?php echo $rows[$count]['business_hour']; ?></td>
										<td><img class="bimg" src="<?php echo $rows[$count]['img_url']; ?>"></img></td>
									</tr>
								<?php
								}
							}
						} else {
							$sql = "SELECT t.id,t.name TName,t.address,t.phone,t.business_hour,t.img_url FROM `bookstores` t";
							if ($stmt = $db->prepare($sql)) {
								$stmt->execute();


								for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++) {
						?>
									<tr>
										<th scope="row"><?php echo $count; ?></th>
										<td><?php echo $rows[$count]['id']; ?></td>
										<td><a href="../content/book.php?bookstore_id=<?php echo $rows[$count]['id']; ?>"><?php echo $rows[$count]['TName']; ?></a></td>
										<td><?php echo $rows[$count]['address']; ?></td>
										<td><?php echo $rows[$count]['phone']; ?></td>
										<td><?php echo $rows[$count]['business_hour']; ?></td>
										<td><img class="bimg" src="<?php echo $rows[$count]['img_url']; ?>"></img></td>
									</tr>
						<?php
								}
							}
						}
						?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	</div>
</body>

</html>