<?php
$itemId = filter_var ($_POST['id'], FILTER_SANITIZE_STRING);
$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

require_once 'Db.php';

$db= new DB();
$response = $db->editItem($itemId, $title, $description);

if($response == true){
  echo json_encode(['success'=> true, 'info'=>"You updated your item successfuly!"]);
}else {
  echo json_encode(['success'=> false, 'info'=>"This item has not been updated!"]);
}
