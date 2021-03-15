<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$_POST = json_decode(file_get_contents('php://input'), true);


$data = [
    "profession" => $_POST['profession'],
    "author" => $_POST['author'],
    "task" => $_POST['task'],
    "date_create" => $_POST['date_create'],
    "done" => $_POST['done']
];

print_r(json_encode($data));

$connection = new PDO('mysql:host=localhost;dbname=todo_list', 'root', 'root');
$sql = 'INSERT INTO todo (profession, author, task, date_create, done) VALUES (:profession, :author, :task, :date_create, :done)';
$statement = $connection-> prepare($sql);
$result = $statement->execute($data);


$last_inserted_id=$connection->lastInsertId();

$data2 = [
    "id" => $last_inserted_id,
    "profession" => $_POST['profession'],
    "author" => $_POST['author'],
    "task" => $_POST['task'],
    "date_create" => $_POST['date_create'],
    "done" => $_POST['done']
];

$object = new stdClass();
$object->dataToDo = $data2;
$object->resultCode = $result;

print_r(json_encode($object));
