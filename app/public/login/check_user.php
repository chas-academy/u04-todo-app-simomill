<?php
/** @var $pdo \PDO */
require_once "../../db.php";
require_once "create_user_function.php";


$statement = $pdo->prepare('SELECT * FROM simondb.users');
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

$username = $_POST['username'];
$alreadyExists = 0;

foreach($users as $i => $user) {
    if ($user['username'] === $username) {
        $alreadyExists ++;
    }
}

if ($alreadyExists === 0) {
    create_user();
} else {
  header('Location: login.php?msg=User already exists.');  
}


