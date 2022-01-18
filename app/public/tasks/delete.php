<?php 

/** @var $pdo \PDO */
require_once "../../db.php";

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: read.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM simondb.tasks WHERE id = :id');
$statement->bindValue(':id', $id);
$statement-> execute();

header('Location: read.php');