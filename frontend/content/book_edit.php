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
  <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
  <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
  <script>
	function ChangeContent(ToyID){
		document.getElementById("ToyID").value = ToyID;
		document.getElementById("mfrom").action = "toy_edit.php";
		document.getElementById("mfrom").submit();
	}
	
	function UpdateContent(){
		document.getElementById("id").value = document.getElementById("ToyID").value;
		document.getElementById("TName").value = document.getElementById("TName").value;
		document.getElementById("Price").value = document.getElementById("Price").value;
		document.getElementById("Description").value = document.getElementById("Description").value;
		document.getElementById("Name").value = document.getElementById("Name").value;
		document.getElementById("Address").value = document.getElementById("Address").value;
		document.getElementById("Phone").value = document.getElementById("Phone").value;
		document.getElementById("mfrom").action = "toy_mdysave.php";
		document.getElementById("mfrom").submit();
	}
	
	function DeleteContent(){
		document.getElementById("ToyID").value = document.getElementById("ToyID").value;
		document.getElementById("mfrom").action = "toy_delsave.php";
		document.getElementById("mfrom").submit();
	}
	
	function InsertContent(){
		document.getElementById("mfrom").action = "toy_add.php";
		document.getElementById("mfrom").submit();
	}
  </script>
</head>
<body>
<form id="mfrom" method="post" action="book_editsave.php">
	<input type="hidden" id="ToyID" name="ToyID" value="<?php echo isset($_POST["ToyID"])?$_POST["ToyID"]:""?>">
	<div class="menu">
		<!-- <table class="menu_css">
			<tr>
				<td>
					<a href="../index.php">Home</a>
				</td>
				<td>
					<a href="toy.php">玩具屋</a>
				</td>
				<td>
					<a href="toy_edit.php">編輯玩具屋</a>
				</td>
			</tr>
		</table> -->
		<!-- <table class="menu_search">
			<tr>
				<td>
					<form method="post" action="toy.php">
					Search
					  <input type="text" id="keyword" name="keyword" value="" placeholder="輸入搜尋關鍵字" />
					  <input type="submit" value="送出">				
					</form>
				</td>
			</tr>
		</table> -->
	</div>
	<div class="content">
		<div class="inner_content">
			<table class="table">
			  <input class="btn btn-default" type="button" value="新增" onclick="InsertContent();">
			  <div style="text-align: left;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 15px;font-weight: bold;">
				總數量為: 
			<?php
				$id = $_GET["id"];
				$sql = "SELECT COUNT(*) FROM books WHERE bookstore_id = ?";
				$stmt =  $db->prepare($sql);
				$error = $stmt->execute(array($$id));
				
				if($rowcount = $stmt->fetchColumn())
					echo $rowcount;
			?>
			  </div>
			  <thead>
				<tr> 
				<th>#</th> 
				<th>id</th> 
				<th>book價錢</th> 
				<th>book數量</th>
				<th>book名稱</th>
				<th>book描述</th> 
				<th>book種類/th> 
				<th>封面</th> 
				<th></th> 
				</tr>  
			  </thead> 
			  <tbody> 
			  <?php
					if(isset($_POST["id"]) && !empty($_POST["id"])){
						$id = $_POST["id"];
						
						$sql = "SELECT * FROM `books` t left join `bookstores` ts on t.bookstore_id = ts.id WHERE t.bookstore_id = ?";
						if($stmt = $db->prepare($sql)){
						$stmt->execute(array($id));			
						if($result = $stmt->fetch()){						
				?>
						<tr> 
						  <th scope="row">
						  	<a class="btn btn-default" role="button" onclick="UpdateContent();">按我更新</a>
						  	<a class="btn btn-default" role="button" onclick="DeleteContent();">按我刪除</a>
						  </th> 
						  <td><input type="text" id="book_name" name="book_name" value="<?php echo $result['book_name'];?>"/></td> 
						  <td><input type="text" id="price" name="price" value="<?php echo $result['price'];?>"/></td> 
						  <td><input type="text" id="description" name="description" value="<?php echo $result['description'];?>"/></td> 
						  <td><input type="text" id="name" name="name" value="<?php echo $result['name'];?>"/></td> 
						  <td><input type="text" id="address" name="address" value="<?php echo $result['address'];?>"/></td> 
						  <td><input type="text" id="phone" name="phone" value="<?php echo $result['phone'];?>"/></td> 
						</tr> 
				<?php
						}
						}
					}else if (isset($_POST["keyword"]) && !empty($_POST["keyword"])){
						$keyword = $_POST["keyword"];
						
						if($keyword == ''){
						  $keyword = '%';
						}else{
						  $keyword = '%'.$keyword.'%';
						}
						
						$sql = "SELECT * FROM `books` t left join `bookstores` ts on t.bookstore_id = ts.id where t.book_name like ? or t.price like ? or t.description like ? or ts.name like ? or t.type like ? or ts.Phone like ? or ts.address like ?";
						if($stmt = $db->prepare($sql)){
						$stmt->execute(array($keyword, $keyword, $keyword, $keyword, $keyword, $keyword));
						
						for($rows = $stmt->fetchAll(),$count = 0;$count<count($rows);$count++){
				?>
							<tr> 
							  <th scope="row"><?php echo $count;?></th> 
							  <td>
								<a onclick="ChangeContent('<?php echo $rows[$count]['id'];?>');"><?php echo $rows[$count]['name'];?></a>
							  </td> 
							  <td><?php echo $rows[$count]['price'];?></td> 
							  <td><?php echo $rows[$count]['description'];?></td> 
						      <td><?php echo $rows[$count]['book_name'];?></td> 
						      <td><?php echo $rows[$count]['address'];?></td> 
						      <td><?php echo $rows[$count]['phone'];?></td> 
						    </tr> 
				<?php
						}			
						}
					}else{
						$sql = "SELECT * FROM `books` t left join `bookstores` ts on t.bookstore_id = ts.id";
					if($stmt = $db->prepare($sql)){
						$stmt->execute();
						
						
						for($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++){
				?>
						<tr> 
						  <th scope="row"><?php echo $count;?></th> 
						  <td>
							<a onclick="ChangeContent('<?php echo $rows[$count]['id'];?>');"><?php echo $rows[$count]['name'];?></a>
						  </td> 
						  <td><?php echo $rows[$count]['price'];?></td> 
						  <td><?php echo $rows[$count]['description'];?></td> 
						  <td><?php echo $rows[$count]['book_name'];?></td> 
						  <td><?php echo $rows[$count]['address'];?></td> 
						  <td><?php echo $rows[$count]['phone'];?></td> 
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
</form>
</body>
</html>