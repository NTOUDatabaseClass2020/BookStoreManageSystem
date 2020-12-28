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
			font-family: �L�n������, �s�ө���, �з���;
			font-weight: bold;
			font-size: 17px;
		}

		#title {
			margin-left: 40px;
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
			font-family: �L�n������, �s�ө���, �з���;
			font-weight: bold;
			font-size: 17px;
		}

		.menu_css {
			float: left;
			width: 70%;
			height: inherit;
			overflow: hidden;
			font-family: �L�n������, �s�ө���, �з���;
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

		.menu_search {
			width: 30%;
			height: inherit;
			white-space: nowrap;
			overflow: hidden;
			font-family: �L�n������, �s�ө���, �з���;
			font-weight: bold;
			font-size: 17px;
			color: white;
		}

		.menu_search tr {
			display: block;
		}

		.menu_search td {
			height: 40px;
			padding: 0px 15px 0px 15px;
		}

		.menu_search td:hover {
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

		.bimg {
			max-width: 100px;
			max-height: 100px;
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

		#search_icon {
			/* width: auto; */
			height: 30px;
			border: #f1f1f1;
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
				<a class="nav-item nav-link " href="../index.php">���� </a>
				<a class="nav-item nav-link active" href="bookstore.php">��^�ѩ�<span class="sr-only">(current)</span></a>
			</div>
		</div>
	</nav>
	<div class="content">
		<div class="inner_content">
			</table>
			<tr class="menu_search">
				<td>
					<form method="post" action="employee.php?bookstore_id=<?php echo $_GET["bookstore_id"] ?>">
						<tr>
							<td> Search</td>
							<div class="input-group mb-3">
									<input type="text" id="keyword" class="form-control" name="keyword" value="" placeholder="��J�j�M����r">
									<button class="btn btn-outline-secondary" type="submit" id="button-addon2">�e�X</button>
							</div>
						</tr>
					</form>
				</td>
			</tr>
			<div class="mt-3 mb-3" style="text-align: left;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 15px;font-weight: bold;">
				�`�ƶq��:
				<?php
				$id = $_GET['bookstore_id'];

				$sql = "SELECT COUNT(*) FROM employees WHERE bookstore_id = ?";
				$stmt =  $db->prepare($sql);
				$error = $stmt->execute(array($id));

				if ($rowcount = $stmt->fetchColumn())
					echo $rowcount;
				?>
				<br>
				<div class="btn-group" role="group" aria-label="Basic example">
					<a type="button" class="btn btn-primary" href="./employee_add.php?bookstore_id=<?php echo $_GET["bookstore_id"]; ?>">�s�W</a>
					<a type="button" class="btn btn-primary" href="./employee_del.php?bookstore_id=<?php echo $_GET["bookstore_id"]; ?>">�R��</a>
					<a type="button" class="btn btn-primary" href="./employee_edit.php?bookstore_id=<?php echo $_GET["bookstore_id"]; ?>">�ק�</a>
				</div>
			</div>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>id</th>
						<th>���u�W�r</th>
						<th>���u�q��</th>
						<th>���u�~��</th>
						<th>���u¾��</th>
						<th>�Ӥ�</th>
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
						$id = $_GET['bookstore_id'];
						$sql = "SELECT bs.id,bs.name,bs.phone,bs.salary,bs.role,bs.img_url FROM employees bs  where (bs.id like ? or bs.name like ? or bs.phone like ? ) and bookstore_id=? ORDER BY bs.id ASC";
						if ($stmt = $db->prepare($sql)) {
							$stmt->execute(array($keyword, $keyword, $keyword, $keyword, $id));
							for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++) {
					?>
								<tr>
									<th scope="row"><?php echo $count; ?></th>
									<td><?php echo $rows[$count]['id']; ?></td>
									<td><?php echo $rows[$count]['name']; ?></td>
									<td><?php echo $rows[$count]['phone']; ?></td>
									<td><?php echo $rows[$count]['salary']; ?></td>
									<td><?php echo $rows[$count]['role']; ?></td>
									<td><img class="bimg" src="<?php echo $rows[$count]['img_url']; ?>"></img></td>
								</tr>
							<?php
							}
						}
					} else {
						$id = $_GET['bookstore_id'];
						$sql = "SELECT bs.id,bs.name,bs.phone,bs.salary,bs.role,bs.img_url FROM employees bs  where (bs.id like ? or bs.name like ? or bs.phone like ? ) and bookstore_id=? ORDER BY bs.id ASC";
						if ($stmt = $db->prepare($sql)) {
							$stmt->execute(array($id));

							for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++) {
							?>
								<tr>
									<th scope="row"><?php echo $count; ?></th>
									<td><?php echo $rows[$count]['id']; ?></td>
									<td><?php echo $rows[$count]['name']; ?></a></td>
									<td><?php echo $rows[$count]['phone']; ?></td>
									<td><?php echo $rows[$count]['salary']; ?></td>
									<td><?php echo $rows[$count]['role']; ?></td>
									<td><img class="bimg" src="<?php echo $rows[$count]['img_url']; ?>"></img></td>
								</tr>
					<?php
							}
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>