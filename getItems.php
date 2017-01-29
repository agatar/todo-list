<?php

require_once'Db.php';

$db = new Db();
$items = $db->getAllItems();

// return array with objects [ object1, object2,object3 ]
if(count($items)== 0){
  echo json_encode(['success'=> false, 'info'=> "There is an error on the backend site!"]);
  exit;
}
  echo json_encode(['success'=> true, 'items'=> $items]);
  exit;
