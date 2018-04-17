<?php
require 'Controllers/QueryBuilder.php';
$db = new QueryBuilder;
$id = $_GET['id'];

$db->delete('tasks', $id);
header('Location: /');