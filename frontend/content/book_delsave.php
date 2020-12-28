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

	#search_icon{
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
	$(document).ready(function(){
	  slider = $('.bxslider').bxSlider(
		  {
			  pagerCustom: '#bx-pager'
		  }
	  );
	  slider.startAuto();
	});
  </script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a id='title' class="navbar-brand" href="">BookStore Manage System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
</nav>
    <div class="content">
          <div class="inner_content">
          
            
            <table class="table"> 
              <thead> 
                <tr>
                  <th>5秒後重導至書庫頁面</th>
                </tr>
              </thead> 
              <tbody> 
<?php
                include("../function/condb.php");
                $book = $_POST["id"];
                $bookstore = $_GET["bookstore_id"];
                // $selectid = $_POST["selectid"];
                // print_r($selectid);
                $sql = "DELETE FROM books WHERE id = ?";
                if($stmt = $db->prepare($sql))
                {
                  
                
                  foreach ($book as $value) 
                  $success = $stmt->execute(array($value));
                  if (!$success) {
                    $redirect_php="book.php?bookstore_id=".$bookstore;
                    $time=5;
                    header("Refresh:$time;$redirect_php");
?><tr><?php echo "刪除失敗!".$stmt->errorInfo();?></tr>
<?php               
                  }
                  else{
                    $id = $db->lastInsertId();
                    $redirect_php="book.php?bookstore_id=".$bookstore;
                    $time=5;
                    header("Location:$redirect_php");
                  }

?>
<?php
                }	
              ?>
              </tbody> 
            </table>
          </div>
        
        
    </div>
</body>
</html>