<?php
require 'Controllers/QueryBuilder.php';
$db = new QueryBuilder;
$id = $_GET['id'];

$db->deleteTask($id);
header('Location: /');