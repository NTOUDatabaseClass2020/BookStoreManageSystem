<?php
  include("../function/condb.php");

  $id = $_POST["id"];
  $name = $_POST["name"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $bussiness_hour = $_POST["business_hour"];
  $img_url = $_POST["img_url"];
  
  /*if($TName == ''){
	 $TName = '更換玩具名稱';           check error
  }
  */
  $sql = ("INSERT INTO bookstores values (?,?,?,?,?,?)");
  if($stmt = $db->prepare($sql)){
  $success = $stmt->execute(array($id, $name, $address, $phone, $bussiness_hour, $img_url));

    if (!$success) {
        echo "儲存失敗!".$stmt->errorInfo();
    }else{
        header("Location: bookstore.php");
    }
    
  }       
	
?>