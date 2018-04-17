<?php

class QueryBuilder{
    function getAllTasks(){
        // 1. Connect to DB
        $pdo = new PDO('mysql:host=localhost; dbname=test', 'root', '');

        //2. Prepare a request
        $sql = 'SELECT * FROM tasks';
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }

    function addTask($data){
        $pdo = new PDO('mysql:host=localhost; dbname=test', "root", "");
        $sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
    }

    function getTask(){
        $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
        $statement = $pdo->prepare("SELECT * FROM tasks WHERE id=:id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $task = $statement->fetch(PDO::FETCH_ASSOC);
        return $task;
    }

}