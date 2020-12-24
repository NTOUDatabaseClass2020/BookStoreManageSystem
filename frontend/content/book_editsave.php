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
  $key = $_POST["selectid"];

  $sql = "UPDATE books SET price=?,amount=?,book_name=?,description=?,type=?,img_url=? WHERE bookstore_id=? and id=?";
  if($stmt = $db->prepare($sql))
  {
    
    for ($i=0; $i < count($key); $i++) { 
      $checkid = $key[$i];  
      for ($j=0; $j < count($book); $j++) { 
          # code...
          $bookid=$book[$j];
          if($checkid == $bookid)
          {
            $bookPrice=$book_Price[$i];
            $bookAmount=$book_Amount[$i];
            $bookName=$book_Name[$i];$bookName=str_replace("\"","&quot;",$bookName);
            $bookDescription=$book_Description[$i];$bookDescription=str_replace("\"","&quot;",$bookDescription);
            $bookType=$book_Type[$i];
            $imgurl=$img_url[$i];
            if(is_numeric($bookPrice)&is_numeric($bookName)&is_numeric($bookAmount)&is_numeric($bookType))
            $success = $stmt->execute(array($bookPrice, $bookAmount,$bookName,$bookDescription,$bookType,$imgurl,$bookstore,$bookid));
            else
            {
              echo "失敗! 輸入不對!! 請檢察輸入".$stmt->errorInfo();
              $redirect_php="book_edit.php?bookstore_id=".$bookstore;
              // time_sleep_until(10);
              $time=5;
              header("Refresh:$time; location:$redirect_php;");
              break;
            }
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
      $redirect_php="book.php?bookstore_id=".$bookstore;
      header("Location:$redirect_php");
    }

    

  }	
?>