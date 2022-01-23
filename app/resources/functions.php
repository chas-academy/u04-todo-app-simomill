<?php

function printTasks() 
{
    global $tasks;
    global $today;
    global $tomorrow;
    global $today_num;
    global $tomorrow_num;
    $over_tasks = [];
    $noday_tasks = [];
    $today_tasks = [];
    $tmrws_tasks = [];
    $later_tasks = [];

    foreach ($tasks as $i => $task) {
        //counting
        if ($task['due_date'] !== null) {
            
            $due_num = intval(str_replace("-", "", $task['due_date']));

            if ($due_num < $today_num) {
                array_push($over_tasks, $task);   
            } elseif ($task['due_date'] === $today) {
                array_push($today_tasks, $task);
            } elseif ($task['due_date'] === $tomorrow) {
                array_push($tmrws_tasks, $task);
            } elseif ($due_num > $tomorrow_num) {
                array_push($later_tasks, $task);
            }
        } else {
            array_push($noday_tasks, $task);
        }
    }

    // OVERDUE
    if (count($over_tasks) != 0) : ?>

        <h2 class="overdue">Overdue!</h2>
            
        <?php 
        foreach ($over_tasks as $i => $task) {
            require '../resources/partials/_taskLine.php';
        } 
    endif;

    // TODAY
    if (count($today_tasks) !== 0): ?>

        <h2>Today</h2> 
        
        <?php foreach ($today_tasks as $i => $task) {
        require '../resources/partials/_taskLine.php';
        }

        echo '<span class="divider"></span>';

        else:
            if (count($over_tasks) === 0): ?>
                <h2>Nothing needs to be done today.</h2>
            <?php endif;
    endif;

    // TOMORROW
    if (count($tmrws_tasks) !== 0): ?>
                
        <h2>Tomorrow</h2>

        <?php foreach ($tmrws_tasks as $i => $task) {
            require '../resources/partials/_taskLine.php';
        }

        echo '<span class="divider"></span>';

    endif; 

    // LATER
    if(count($later_tasks) !== 0): ?>

        <h2>Later</h2>

        <?php foreach ($later_tasks as $i => $task) {
            require '../resources/partials/_taskLine.php';
        }

        echo '<span class="divider"></span>';

    endif;
}

function create_user() 
{    
    global $pdo;
    $username = $_POST['username'];
    $password = password_hash($_POST['signupPass'], PASSWORD_DEFAULT);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $statement = $pdo->prepare("INSERT INTO simondb.users (username, password)
            VALUES (:username, :password)");

        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        header('Location: read.php');
    }
}