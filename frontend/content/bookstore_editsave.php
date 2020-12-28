<?php
  include("../function/condb.php");

  $id_to_edit = $_POST['id'];
  $name_to_edit = $_POST['name'];
  $address_to_edit = $_POST['address'];
  $phone_to_edit = $_POST['phone'];
  $business_hour_to_edit = $_POST['business_hour'];
  $img_to_edit = $_POST['img_url'];
  
  $sql = "UPDATE bookstores SET name = ?,address = ?,phone = ?,business_hour = ?,img_url = ? WHERE id = ?";
  if($stmt = $db->prepare($sql)){
  $success = $stmt->execute(array($name_to_edit, $address_to_edit, $phone_to_edit, $business_hour_to_edit, $img_to_edit,$id_to_edit));

    if (!$success) {
        echo "儲存失敗!".$stmt->errorInfo();
    }
    else{
        header('Location: bookstore.php');
    }
  }       
	
?>