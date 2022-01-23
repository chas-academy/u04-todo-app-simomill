<?php
/** @var $pdo \PDO */
require_once "../resources/db.php";
require_once "../resources/functions.php";

$statement = $pdo->prepare('SELECT * FROM simondb.users');
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

//---CHECK IF USER EXISTS
$username = $_POST['username'];
$alreadyExists = 0;
$userMatch;

foreach($users as $i => $user) {
    if ($user['username'] === $username) {
        $alreadyExists ++;
        $userMatch = $user;
    }
}

if ($alreadyExists === 0) {
    if (isset($_POST['signupPass'])) {
        create_user();
    }
} else {
    if (isset($_POST['signupPass'])) {
        header('Location: index.php?msg=User already exists.');  
    }
}

//-----CHECK PASSWORD
if (isset($_POST['loginPass'])) {
    $password = password_hash($_POST['loginPass'], PASSWORD_DEFAULT);
}

if ($alreadyExists != 0) { 
    if (password_verify($_POST['loginPass'], $userMatch['password'])) {
        header('Location: read.php');
    } else {
        header('Location: index.php?msg=Wrong password.');  
    }
} else {
    if (password_verify($_POST['loginPass'], $userMatch['password'])) {
        header('Location: read.php');
    } else {
        header('Location: index.php?msg=User does not exist.');
    }
}

session_start();
$_SESSION['userID'] = $userMatch['id'];