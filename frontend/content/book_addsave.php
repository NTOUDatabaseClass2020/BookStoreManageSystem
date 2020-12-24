<?php
  include("../function/condb.php");
	$book_store = $_GET["bookstore_id"];
  $book_Price = $_GET["book_Price"];
  $book_Amount= $_GET["book_Amount"];
  $book_Name = $_GET["book_Name"];
  $book_Description = $_GET["book_Description"];
  $book_Type = $_GET["book_Type"];
  $img_url = $_GET["img_url"];
 print_r(count($book_Name));
  $sql = "INSERT INTO books (bookstore_id,price,amount,book_name,description,type,img_url) values (?,?,?,?,?,?,?)";
  if($stmt = $db->prepare($sql))
  {
    for ($i=0; $i < count($book_Name); $i++) { 
      # code...
      $bookPrice=$book_Price[$i];
      $bookAmount=$book_Amount[$i];
      $bookName=$book_Name[$i];$bookName=str_replace("\"","&quot;",$bookName);
      $bookDescription=$book_Description[$i];$bookDescription=str_replace("\"","&quot;",$bookDescription);
      $bookType=$book_Type[$i];
      $imgurl=$img_url[$i];
      
      $success = $stmt->execute(array($book_store, $bookPrice, $bookAmount,$bookName,$bookDescription,$bookType,$imgurl));
    }
    
    // $success = $stmt->execute(array($book_store, $book_Price, $book_Amount,$book_Name,$book_Description,$book_Type,$img_url));
    if (!$success) {
      echo "儲存失敗!".$stmt->errorInfo();
    }
    else{
      $id = $db->lastInsertId();
      $redirect_php="book.php?bookstore_id=".$book_store;
      header("Location:$redirect_php");
    }

   

  }	
?>