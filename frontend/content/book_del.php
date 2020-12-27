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
		font-family: 微軟正黑體,新細明體,標楷體;
		font-weight: bold;
		font-size: 17px;
	}

	.menu {
		position:fixed;
		width: 100%;
		height: 40px;
		background-color: dimgrey;
		z-index: 9999999;
	}

	.menu a {
		text-decoration: none;
		color: white;
		font-family: 微軟正黑體,新細明體,標楷體;
		font-weight: bold;
		font-size: 17px;
	}

	.menu_css {
		float: left;
		width: 70%;
		height: inherit;
		overflow: hidden;
		font-family: 微軟正黑體,新細明體,標楷體;
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

	.menu_search{
		width: 30%;
		height: inherit;
		white-space: nowrap;
		overflow: hidden;
		font-family: 微軟正黑體,新細明體,標楷體;
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
		background-color: #f1f1f1;
	}

	.inner_content {
		padding: 50px 130px 220px 130px;
	}

	.inner_content table {
		background-color: white;
	}

	.bimg{
		max-width:100px;
		max-height:100px;
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<link href="css/jquery.bxslider.min.css" rel="stylesheet" />
	<script>
	$(document).ready(function(){
		slider = $('.bxslider').bxSlider(
			{
				pagerCustom: '#bx-pager'
			}
		);
		slider.startAuto();
	});
	</script>
  
	<script type="text/javascript">
		function check_all(obj,cName)
		{
			var checkboxs = document.getElementsByName(cName);
			for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;}
		}
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
		<a class="nav-item nav-link active" href="book.php?bookstore_id=<?php echo $_GET["bookstore_id"]; ?>">編輯書庫<span class="sr-only">(current)</span></a>
		</div>
	</div>
	</nav>
			<div class="content">
			<div class="inner_content">
			<tr class="menu_search">
						<td>
							<form method="post" action="book_del.php?bookstore_id=<?php echo $_GET["bookstore_id"] ?>">
								<tr>
									<td>Search</td>
									<td><input type="text" id="keyword" name="keyword" value="" placeholder="輸入搜尋關鍵字" /></td>
									<td><input type="submit" value="送出"></td>
								</tr>				  
							</form>
						</td>
					</tr>
			<table>
					
					
			<form action="book_delsave.php?bookstore_id=<?php echo $_GET["bookstore_id"]?>" method="post">
								<div style="text-align: left;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 15px;font-weight: bold;">
									總數量為: 
									<?php
										$id = $_GET['bookstore_id'];
										
										$sql = "SELECT COUNT(*) FROM books WHERE bookstore_id = ?";
										$stmt =  $db->prepare($sql);
										$error = $stmt->execute(array($id));
										
										if($rowcount = $stmt->fetchColumn())
											echo $rowcount;
									?>
									<button type="submit" name="id" >點我刪除</button>
								</div>
								
								<table class="table">
								
									<thead> 
										<tr> 
										<th><input type="checkbox" name="all" onclick="check_all(this,'id[]')" />#</th> 
										<th>id</th> 
										<th>book價錢</th> 
										<th>book數量</th>
										<th>book名稱</th>
										<th>book描述</th> 
										<th>book種類編號</th> 
										<th>目前book種類名稱</th>
										<th>封面</th> 
										<th></th> 
										</tr> 
									</thead> 
										<tbody> 
											<?php
													if (isset($_POST["keyword"]))
													{
														$keyword = $_POST["keyword"];
												if($keyword == ''){
													$keyword = '%';
												}else{
													$keyword = '%'.$keyword.'%';
												}
												$id = $_GET['bookstore_id'];
												$sql = "SELECT bs.id,bs.price,bs.amount,bs.book_name,bs.description,bs.type,bs.img_url,btl.type_name FROM books bs left join booktype_list btl on bs.type = btl.type where (bs.id like ? or bs.book_name like ? or bs.type like ? or btl.type_name like ?) and bookstore_id=? ORDER BY bs.id ASC";
													if($stmt = $db->prepare($sql)){
													$stmt->execute(array($keyword, $keyword, $keyword, $keyword, $id));
													for($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++){
											?>
													<tr> 
													<th scope="row"><input type="checkbox" name="id[]" value="<?php echo $rows[$count]['id'];?>"> </th>
														<th scope="row"><?php echo $count;?></th> 
														<td><?php echo $rows[$count]['id'];?></td> 
														<td><?php echo $rows[$count]['price'];?></td> 
														<td><?php echo $rows[$count]['amount'];?></td> 
														<td><?php echo $rows[$count]['book_name'];?></td> 
														<td><?php echo $rows[$count]['description'];?></td> 
														<td><?php echo $rows[$count]['type'];?></td> 
														<td><?php echo $rows[$count]['type_name'];?></td>
														<td><img class="bimg" src="<?php echo $rows[$count]['img_url'];?>"></img></td> 
														<!-- <td><input type="hidden" name="selectid[]" value="<?php echo $rows[$count]['id'];?>"></td> -->
													</tr> 
											<?php
												}		
											}
												}else{
													$id = $_GET['bookstore_id'];
													$sql = "SELECT bs.id,bs.price,bs.amount,bs.book_name,bs.description,bs.type,bs.img_url,btl.type_name  FROM books bs left join booktype_list btl on bs.type = btl.type  WHERE bookstore_id = ? ORDER BY bs.id ASC";
													if($stmt = $db->prepare($sql)){
														$stmt->execute(array($id));
														
														for($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++){
											?>
													<tr> 
													<th scope="row"><input type="checkbox" name="id[]" value="<?php echo $rows[$count]['id'];?>"> </th> 
													<td><?php echo $rows[$count]['id'];?></td> 
													<td><?php echo $rows[$count]['price'];?></a></td> 
													<td><?php echo $rows[$count]['amount'];?></td> 
													<td><?php echo $rows[$count]['book_name'];?></td> 
													<td><?php echo $rows[$count]['description'];?></td> 
													<td><?php echo $rows[$count]['type'];?></td> 
													<td><?php echo $rows[$count]['type_name'];?></td>
													<td><img class="bimg" src="<?php echo $rows[$count]['img_url'];?>"></img></td> 
													
													</tr> 
											<?php
														}
													}
												}
											?>
										</tbody> 
									
								</table>
								</form>
					
			</table>
			</div>
			</div>
	</body>
	</html>