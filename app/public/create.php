<?php

/** @var $pdo \PDO */
require_once "../db.php";

$title = $_POST['title'];
$desc = $_POST['description'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($title) {
        $urgency = null;
        
        if (isset($_POST['urgency'])) {
            $urgency = $_POST['urgency'];
            }

        $statement = $pdo->prepare("INSERT INTO simondb.Tasks (title, description, urgency, create_date, finnished)
            VALUES (:title, :description, :urgency, :created, :finnished)");

            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $desc);
            $statement->bindValue(':urgency', $urgency);
            $statement->bindValue(':created', date('Y-m-d H:i:s'));
            $statement->bindValue(':finnished', 0);
            $statement->execute();
            header('Location: index.php');
        
    }
}






