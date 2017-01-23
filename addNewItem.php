<?php
  $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
  $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

  if(empty($title) || empty($description)){
    echo json_encode(['success'=> false, 'info'=>"Please complete your form prior submitting!"]);
    exit;
  }

  require_once'Db.php';
  //Connect with database
  $db = new Db();
  $result = $db->insertItemToDatabase($title,$description);
  if($result){
    echo json_encode(["success"=>true]);
  }else{
    echo json_encode(["success"=>false, "info"=>"There is an error on the backend site!"]);
  }





?>
