<?php
  include("../function/condb.php");
  $book = $_POST["id"];
  $bookstore = $_GET["bookstore_id"];
  // $book_Price = $_GET["book_Price"];
  // $book_Amount= $_GET["book_Amount"];
  // $book_Name = $_GET["book_Name"];
  // $book_Description = $_GET["book_Description"];
  // $book_Type = $_GET["book_Type"];
  // $img_url = $_GET["img_url"];

  // foreach ($book as $value) {
  //   # code...
  //   echo $value+"\n";
  // }
  
  $sql = "DELETE FROM books WHERE id = ?";
  if($stmt = $db->prepare($sql))
  {
    foreach ($book as $value) 
    $success = $stmt->execute(array($value));
  
    if (!$success) {
      echo "刪除失敗!".$stmt->errorInfo();
    }
    else{
      $id = $db->lastInsertId();
      $redirect_php="book.php?id=".$bookstore;
      header("Location:$redirect_php");
    }

   

  }	
?>