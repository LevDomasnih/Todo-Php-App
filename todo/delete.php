<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$_POST = json_decode(file_get_contents('php://input'), true);

$data = [
    "id" => $_POST['id']
];

$connection = new PDO('mysql:host=localhost;dbname=todo_list', 'root', 'root');
$sql = 'DELETE FROM todo WHERE `id` = :id ';
$statement = $connection-> prepare($sql);
$result = $statement->execute($data);

var_dump($_POST);