<?php
/** @var $pdo \PDO */
require_once "../../db.php";

function create_user() {
    
    global $pdo;
    $username = $_POST['username'];
    $password = password_hash($_POST['signupPass'], PASSWORD_DEFAULT);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $statement = $pdo->prepare("INSERT INTO simondb.users (username, password)
            VALUES (:username, :password)");

        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        header('Location: ../tasks/read.php');

    }

}