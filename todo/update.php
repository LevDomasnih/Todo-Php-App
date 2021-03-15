<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$_POST = json_decode(file_get_contents('php://input'), true);

$data = [
    "id" => $_POST['id'],
    "profession" => $_POST['profession'],
    "author" => $_POST['author'],
    "task" => $_POST['task'],
    "date_create" => $_POST['date_create'],
    "done" => $_POST['done'],
];
var_dump($data);
$connection = new PDO('mysql:host=localhost;dbname=todo_list', 'root', 'root');
$sql = 'UPDATE todo SET `profession` = :profession, `author` = :author, `task` = :task, `date_create` = :date_create, `done` = :done WHERE `id` = :id ';
$statement = $connection-> prepare($sql);
$result = $statement->execute($data);

var_dump($result);