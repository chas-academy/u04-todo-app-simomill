<?php
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

// CHECK IF USERNAME IS AVAILABLE FOR SIGNUP
if (isset($_POST['signupPass'])) {

    if ($alreadyExists === 0) {
        create_user();
        header('Location: index.php?green=User was successfully created.');

    } else {
        header('Location: index.php?msg=User already exists.');  
    }
}

//-----CHECK CORRECT PASSWORD FOR LOGIN
if (isset($_POST['loginPass'])) {

    $password = password_hash($_POST['loginPass'], PASSWORD_DEFAULT);

    if ($alreadyExists != 0) { 
        if (password_verify($_POST['loginPass'], $userMatch['password'])) {
            header('Location: read.php');
        } else {
            header('Location: index.php?msg=Wrong password.');  
        }
    } else {
        header('Location: index.php?msg=User does not exist.');
    }
}

//--------SAVE USERNAME AND ID FOR CORRECT DISPLAY 
session_start();
$_SESSION['userID'] = $userMatch['id'];
$_SESSION['username'] = $userMatch['username'];