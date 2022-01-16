<?php

/** @var $pdo \PDO */
require_once "../db.php";

$title = $_POST['title'];
$desc = $_POST['description'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($title) {
        
        
        if (isset($_POST['due_date'])) {
            $due_date = $_POST['due_date'];
        } 

        if ($due_date === "") {
            $due_date = null;
        }

        $statement = $pdo->prepare("INSERT INTO simondb.Tasks (title, description, due_date, create_date, finnished)
            VALUES (:title, :description, :due_date, :created, :finnished)");

            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $desc);
            $statement->bindValue(':due_date', $due_date);
            $statement->bindValue(':created', date('Y-m-d H:i:s'));
            $statement->bindValue(':finnished', 0);
            $statement->execute();
            header('Location: index.php');
        
    }
}

echo $due_date;






