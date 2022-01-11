<?php 

/** @var $pdo \PDO */
require_once "../db.php";

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM simondb.Tasks WHERE id = :id');
$statement->bindValue(':id', $id);
$statement-> execute();

header('Location: index.php');