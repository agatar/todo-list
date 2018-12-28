<?php
require './vendor/autoload.php';

class Db{
  public $mysql;

  public function __construct(){
    try{
      $dotenv = new Dotenv\Dotenv(__DIR__);
      $dotenv->load();

      $DB_HOST = getenv('DB_HOST');
      $DB_DATABASE = getenv('DB_DATABASE');
      $DB_USERNAME = getenv('DB_USERNAME');
      $DB_PASSWORD = getenv('DB_PASSWORD');

      $this->mysql = new PDO("mysql:host=$DB_HOST;dbname=$DB_DATABASE", $DB_USERNAME, $DB_PASSWORD);
    }catch(PDOException $e){
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function insertItemToDatabase($title, $description){
    $stmt= $this->mysql->prepare("INSERT INTO todos (title,description) VALUES (?,?)");
    $result= $stmt->execute([$title, $description]);
    return $result;
  }

  public function getAllItems(){
    $stmt = $this->mysql->query("SELECT * FROM todos");
    $items = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $items;
  }

  public function deleteItem($itemId){
    $stmt= $this->mysql->prepare("DELETE FROM todos WHERE id=?");
    $stmt->execute([$itemId]);
    if ($stmt->rowCount() > 0) {
      return true;
    }else{
      return false;
    }
  }

  public function editItem($itemId, $title, $description){
    $stmt = $this->mysql->prepare("UPDATE todos SET title=?, description=? WHERE id=?");
    $result = $stmt->execute([$title, $description, $itemId]);
    if ($stmt->rowCount() > 0) {
      return true;
    }
      return false;
  }

  public function clearAll(){
    $stmt = $this->mysql->query("DELETE FROM todos");
    if ($stmt->rowCount() > 0) {
      return true;
    }else{
      return false;
    }
  }

  public function truncateTodos(){
    $this->mysql->query("TRUNCATE todos");
    $this->mysql->query("ALTER table todos AUTO_INCREMENT = 1");
  }

  public function insertDefaultTasks(){
    $this->mysql->query("INSERT INTO todos (id, title, description) values
      (1,'Shopping','Go to the supermarket and buy milk, bread, butter, veggies, eggs'),
      (2,'Gym','Go to the gym: weight training'),
      (3,'Dog','Take a dog for a walk')");
  }

}