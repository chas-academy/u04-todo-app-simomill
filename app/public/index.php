<?php
/** @var $pdo \PDO */
require_once "../db.php";

$statement = $pdo->prepare('SELECT * FROM simondb.tasks ORDER BY create_date DESC');
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

$today = date('Y-m-d');
$tomorrow = new DateTime('tomorrow');
$tomorrow = $tomorrow->format('Y-m-d');

$tomorrow_num = intval(str_replace("-", "", $tomorrow));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Todo App</title>
    <script src="https://kit.fontawesome.com/723fbc7b2c.js" crossorigin="anonymous"></script>

</head>
<body>
    <main>

    <h1>todooer</h1>

    <a href="tasks/add.php" class="add btn">Add Task</a>

    <?php   
// ----------UNSCHEDULED TASKS
        
    $noday_tasks = 0;
    
    foreach ($tasks as $i => $task) {
        if ($task['due_date'] === null) {
            $noday_tasks ++ ;   
        }};

    if ($noday_tasks !== 0): ?>
    
        <h2>Unscheduled tasks</h2>

        <div class="item heading">
                <span>Task</span>
                <span>Description</span>
                <span>Due</span>
                <span>Delete</span>
                <span>Edit</span>
                <span>Done</span>  
            </div>

    <?php endif; 

    foreach ($tasks as $i => $task) {
        
        if ($task['due_date'] === null) {
            require '../partials/_tableLoop.php';
        }
    }
    
    if ($noday_tasks !== 0) {
        echo '<span class="divider"></span>';
    }

    
//-----------TODAYS TASKS
     
    $today_tasks = 0;
    
    foreach ($tasks as $i => $task) {
        if ($task['due_date'] === $today) {
            $today_tasks ++ ;   
        }};

    if ($today_tasks !== 0): ?>
        
        <h2>Today</h2>

        <div class="item heading">
            <span>Task</span>
            <span>Description</span>
            <span>Due</span>
            <span>Delete</span>
            <span>Edit</span>
            <span>Done</span>  
        </div>
        
    <?php else: ?>
        <?php if (empty($tasks)): ?>
        <h2>Nothing needs to be done today.</h2>
    <?php endif; endif; ?>

    <?php foreach ($tasks as $i => $task) {

        if ($task['due_date'] === $today) {
            require '../partials/_tableLoop.php';
        }
    }
    
    if ($today_tasks !== 0) {
        echo '<span class="divider"></span>';
    }

//----------TOMORROWS TASKS

    $tmrws_tasks = 0;
    
    foreach ($tasks as $i => $task) {
        if ($task['due_date'] === $tomorrow) {
            $tmrws_tasks ++ ;   
        }};

    if ($tmrws_tasks !== 0): ?>
        
        <h2>Tomorrow</h2>

        <div class="item heading">
            <span>Task</span>
            <span>Description</span>
            <span>Due</span>
            <span>Delete</span>
            <span>Edit</span>
            <span>Done</span>  
        </div>
        
    <?php endif; ?>

    <?php foreach ($tasks as $i => $task) {

        if ($task['due_date'] === $tomorrow) {
            require '../partials/_tableLoop.php';
        }
    }
    
    if ($tmrws_tasks !== 0) {
        echo '<span class="divider"></span>';
    }

//----------LATER TASKS

    $later_tasks = 0;

    foreach ($tasks as $i => $task) {
        if ($task['due_date'] !== null) {
            $due_num = intval(str_replace("-", "", $task['due_date']));

            if ($due_num > $tomorrow_num) {
                $tmrws_tasks ++ ;   
            }}
        };

    if ($tmrws_tasks !== 0): ?>
    
        <h2>Later</h2>

        <div class="item heading">
                <span>Task</span>
                <span>Description</span>
                <span>Due</span>
                <span>Delete</span>
                <span>Edit</span>
                <span>Done</span>  
            </div>
    
    <?php endif; ?>

    <?php foreach ($tasks as $i => $task) {

        if ($task['due_date'] !== $today && $task['due_date'] !== $tomorrow && $task['due_date'] !== null) {
            require '../partials/_tableLoop.php';
        }
    }

    if ($later_tasks !== 0) {
    echo '<span class="divider"></span>';
    }


    ?>

    </main>
</body>
</html>
