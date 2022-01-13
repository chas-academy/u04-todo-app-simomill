<?php
/** @var $pdo \PDO */
require_once "../db.php";

$statement = $pdo->prepare('SELECT * FROM simondb.Tasks ORDER BY create_date DESC');
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

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

    <h1>Todo app</h1>

    <a href="add.php" class="add btn">Add Task</a>

    
    <div class="item heading">
            <span>Task</span>
            <span>Description</span>
            <span>Urgency</span>
            <span>Created</span>
            <span>Delete</span>
            <span>Edit</span>
            <span>Done</span>
            
        </div>

        <?php foreach ($tasks as $i => $task): ?>
            <?php if ($task['urgency'] === null): ?>
            <?php require '../partials/_tableLoop.php'; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($tasks as $i => $task): ?>
            <?php if ($task['urgency'] === 'Today'): ?>
            <?php require '../partials/_tableLoop.php'; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        
        <?php foreach ($tasks as $i => $task): ?>
            <?php if ($task['urgency'] === 'This Week'): ?>
            <?php require '../partials/_tableLoop.php'; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        
        <?php foreach ($tasks as $i => $task): ?>
            <?php if ($task['urgency'] === 'This Month'): ?>
            <?php require '../partials/_tableLoop.php'; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($tasks as $i => $task): ?>
            <?php if ($task['urgency'] === 'This Year'): ?>
            <?php require '../partials/_tableLoop.php'; ?>
            <?php endif; ?>
        <?php endforeach; ?>
     
        <?php foreach ($tasks as $i => $task): ?>
            <?php if ($task['finnished'] === '1'): ?>
            <?php require '../partials/_tableLoop.php'; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo $_POST['completed'];
     } 
     ?>

    </main>
</body>
</html>
