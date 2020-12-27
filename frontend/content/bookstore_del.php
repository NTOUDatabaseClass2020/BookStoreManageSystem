<?php
    include("../function/condb.php");

    $id_to_delete = $_POST['id_to_delete'];

    $sql = "DELETE FROM bookstores WHERE id = ?";

    if($stmt = $db->prepare($sql))
    {
        $success = $stmt->execute(array($id_to_delete));
        if (!$success) {
			echo "刪除失敗!".$stmt->errorInfo();
          }
        else{
            header('Location: bookstore.php');
        }
    }
?>