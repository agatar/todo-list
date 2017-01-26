<?php
$itemId = $_POST["item"];

require_once 'Db.php';
$db = new Db();
$response = $db->deleteItem($itemId);

if($response == true){
  echo json_encode(['success'=>true,"info"=>"You have deleted an item successfuly!"]);
} else {
  echo json_encode(['success'=>false,"info"=>"There was a problem with deleting an item, please try again!"]);
}


?>
