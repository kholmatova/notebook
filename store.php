<?php
require 'Controllers/QueryBuilder.php';

$db = new QueryBuilder;
$tasks = $db->store('tasks', $_POST);

header('Location: /'); exit;



