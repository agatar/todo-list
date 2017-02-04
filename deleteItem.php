<?php
$itemId = $_POST["item"];

require_once 'Db.php';
$db = new Db();
$response = $db->deleteItem($itemId);

if($response == true){
  echo json_encode(['success'=>true,"info"=>"You have deleted a task successfuly!"]);
} else {
  echo json_encode(['success'=>false,"info"=>"There was a problem with deleting a task, please try again!"]);
}
