<?php
  include("../function/condb.php");
  $book = $_POST["id"];
  $bookstore = $_GET["bookstore_id"];
  $selectid = $_POST["selectid"];
  print_r($selectid);
  $sql = "DELETE FROM books WHERE id = ?";
  if($stmt = $db->prepare($sql))
  {
    
    if(empty($selectid))
    foreach ($book as $value) 
    $success = $stmt->execute(array($value));
    else
    foreach ($selectid as $value) 
    $success = $stmt->execute(array($value));
    if (!$success) {
      echo "刪除失敗!".$stmt->errorInfo();
    }
    else{
      $id = $db->lastInsertId();
      $redirect_php="book.php?bookstore_id=".$bookstore;
      header("Location:$redirect_php");
    }

   

  }	
?>