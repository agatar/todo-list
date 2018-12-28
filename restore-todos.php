<?php
require './Db.php';

$db = new Db();
$db->truncateTodos();
$db->insertDefaultTasks();
