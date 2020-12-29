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
		width: 100%;
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
	
	.content {
		position: relative;
		word-wrap: break-word;
		width: 100%;
		top: 40px;
	}
	
	.inner_content {
		padding: 50px 60px 220px 60px;
	}
	
	.inner_content table {
		background-color: white;
	}
	
    #title{
		margin-left : 40px;
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
  <script>	
	function InsertContent(){
		document.getElementById("id").value = document.getElementById("id").value;
		document.getElementById("name").value = document.getElementById("name").value;
		document.getElementById("address").value = document.getElementById("address").value;
        document.getElementById("Phone").value = document.getElementById("phone").value;
        document.getElementById("bussiness_hour").value = document.getElementById("business_hour").value;
		document.getElementById("img_url").value = document.getElementById("img_url").value;
		document.getElementById("mfrom").action = "bookstore_addsave.php";
		document.getElementById("mfrom").submit();
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
            <a class="nav-item nav-link active" href="bookstore.php">書店</a>
        </div>
    </div>
    </nav>
    <form id="mfrom" method="post" action="bookstore_editsave.php">
	<div class="content">
		<div class="inner_content">
			<table class="table table-bordered table-striped">
			  <thead>
				<tr> 
				  <th>#</th> 
				  <th>書店名稱</th> 
				  <th>地址</th> 
				  <th>電話</th> 
				  <th>營業時間</th> 
				  <th>圖片</th>
				</tr>  
			  </thead> 
			  <tbody>
					<tr> 
					  <td><input  type="submit" name ="submit" value= "修改" class="btn btn-primary">
					  <td><input class="form-control" type="text" id="name" name="name" value="<?php echo $_POST['name_to_edit']?>"/></td> 
					  <td><input class="form-control" type="text" id="address" name="address" value="<?php echo $_POST['address_to_edit']?>"/></td> 
					  <td><input class="form-control" type="text" id="phone" name="phone" value="<?php echo $_POST['phone_to_edit']?>"/></td> 
                      <td><input class="form-control" type="text" id="business_hour" name="business_hour" value="<?php echo $_POST['business_hour_to_edit']?>"/></td> 
					  <td><input class="form-control" type="text" id="img_url" name="img_url" value="<?php echo $_POST['img_to_edit']?>"/></td> 
					  <td><input class="form-control" type="hidden" name="id" value="<?php echo $_POST['id_to_edit']?>"/></td>
					</tr> 
			  </tbody> 
			</table>
		</div>
	</div>
</form>
</body>
</html>