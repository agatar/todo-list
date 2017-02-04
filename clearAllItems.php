<?php

require_once'Db.php';
$db = new Db();
$response = $db->clearAll();

if ($response == true){
  echo json_encode(['success'=>true, 'info'=>"You have deleted all tasks successfuly!"]);
}else{
  echo json_encode(['success'=>false, 'info'=>"There was a problem with deleting all tasks, please try again!"]);
}
