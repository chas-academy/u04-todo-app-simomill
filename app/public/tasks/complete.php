<?php

/** @var $pdo \PDO */
require_once "../../db.php";

$id = $_POST['id'] ?? null;


if (!$id) {
    // echo "No ID";

    header('Location: read.php');
    exit;
}

// echo $id;


$statement = $pdo->prepare('SELECT * FROM simondb.tasks WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$task = $statement->fetch(PDO::FETCH_ASSOC);



$completed = $_POST['completed'] ?? null;

if ($completed === "on") {

    $finnished = 1;

} else {
    $finnished = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $statement = $pdo->prepare("UPDATE simondb.tasks SET finnished = :finnished WHERE id = :id");

    $statement->bindValue(':finnished', $finnished);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('Location: read.php');
}
