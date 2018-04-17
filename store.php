<?php

require 'Controllers/QueryBuilder.php';

$db = new QueryBuilder;
$tasks = $db->addTask($_POST);

header('Location: /'); exit;



