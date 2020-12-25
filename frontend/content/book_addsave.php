<?php
  include("../function/condb.php");
	$book_store = $_GET["bookstore_id"];
  $book_Price = $_GET["book_Price"];
  $book_Amount= $_GET["book_Amount"];
  $book_Name = $_GET["book_Name"];
  $book_Description = $_GET["book_Description"];
  $book_Type = $_GET["book_Type"];
  $img_url = $_GET["img_url"];
//  print_r(count($book_Name));
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
      if(is_numeric($bookPrice)&is_numeric($bookAmount)&is_numeric($bookType))
      {try {
        //code...
        $success = $stmt->execute(array($book_store, $bookPrice, $bookAmount,$bookName,$bookDescription,$bookType,$imgurl));
        if (!$success) {
          throw new Exception("Error Processing Request", 1);
          
          echo "失敗!".$stmt->errorInfo();
          $redirect_php="book_add.php?bookstore_id=".$bookstore;
          $time=5;
          header("Refresh:$time;$redirect_php");
        }
        else{
          $id = $db->lastInsertId();
          $redirect_php="book.php?bookstore_id=".$book_store;
          header("Location:$redirect_php");
        }
      } catch (Exception $th) {
        //throw $th;
        echo $th;
      }
        
        
      }
      
      else
            {
              $id = $db->lastInsertId();
              echo "失敗! 輸入不對!! 請檢察輸入!!".$stmt->errorInfo();
              $redirect_php="book_add.php?bookstore_id=".$bookstore;
              $time=5;
              
              header("Refresh:$time;$redirect_php");
              break;
            }
    }
    
    if (!$success) {
      echo "儲存失敗!".$stmt->errorInfo();
      $redirect_php="book_add.php?bookstore_id=".$bookstore;
      $time=5;
      header("Refresh:$time;$redirect_php");
    }
    else{
      $id = $db->lastInsertId();
      $redirect_php="book.php?bookstore_id=".$book_store;
      header("Location:$redirect_php");
    }

   

  }	
?>