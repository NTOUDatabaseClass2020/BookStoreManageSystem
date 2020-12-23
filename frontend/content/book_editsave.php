<?php
  include("../function/condb.php");
  $bookstore = $_GET["bookstore_id"];
  $book = $_POST["id"];
  $book_Price = $_POST["book_Price"];
  $book_Amount= $_POST["book_Amount"];
  $book_Name = $_POST["book_Name"];
  $book_Description = $_POST["book_Description"];
  $book_Type = $_POST["book_Type"];
  $img_url = $_POST["img_url"];
  

						
  $sql = "SELECT COUNT(*) FROM books WHERE bookstore_id = ?";
  $stmt =  $db->prepare($sql);
  $error = $stmt->execute(array($bookstore));
  $rowcount = $stmt->fetchColumn();
  $sql = "SELECT id FROM books WHERE bookstore_id = ?";
  $stmt =  $db->prepare($sql);
  $error = $stmt->execute(array($bookstore));
  $rowget = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
  print_r($book);//print_r($bookPrice);
  $sql = "UPDATE books SET price=?,amount=?,book_name=?,description=?,type=?,img_url=? WHERE bookstore_id=? and id=?";
  if($stmt = $db->prepare($sql))
  {
    for ($i=0; $i < $rowcount; $i++) { 
      $checkid = $rowget[$i];  
      for ($j=0; $j < count($book); $j++) { 
          # code...
          $bookid=$book[$j];
          if($checkid == $bookid)
          {
            $bookPrice=$book_Price[$i];
            $bookAmount=$book_Amount[$i];
            $bookName=$book_Name[$i];
            $bookDescription=$book_Description[$i];
            $bookType=$book_Type[$i];
            $imgurl=$img_url[$i];
            $success = $stmt->execute(array($bookPrice, $bookAmount,$bookName,$bookDescription,$bookType,$imgurl,$bookstore,$bookid));
          }
          else {
            continue;
          }
      }
    }
    if (!$success) {
      echo "失敗!".$stmt->errorInfo();
    }
    else{
      $id = $db->lastInsertId();
      $redirect_php="book.php?id=".$bookstore;
      header("Location:$redirect_php");
    }

    

  }	
?>