<?php

class QueryBuilder{
    // Get all tasks from db
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

    // Adding a new task
    function addTask($data){
        $pdo = new PDO('mysql:host=localhost; dbname=test', "root", "");
        $sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
    }

    // Getting one task
    function getTask($id){
        $pdo = new PDO('mysql:host=localhost; dbname=test', 'root', '');
        $statement = $pdo->prepare('SELECT * FROM tasks WHERE id=:id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $task = $statement->fetch(PDO::FETCH_ASSOC);
        return $task;
    }

    // Updating a task
    function updateTask($data) {
        $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
        $sql = 'UPDATE tasks SET title=:title, content=:content WHERE id=:id';
        $statement = $pdo->prepare($sql);
        $statement->execute($data); // true || false
    }

    // Deleting a task
    function deleteTask($id)
    {
        $pdo = new PDO('mysql:host=localhost; dbname=test', 'root', '');
        $sql = 'DELETE FROM tasks WHERE id=:id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

}