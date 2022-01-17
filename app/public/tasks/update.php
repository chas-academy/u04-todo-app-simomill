<?php

/** @var $pdo \PDO */
require_once "../../db.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: ../index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM simondb.tasks WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$task = $statement->fetch(PDO::FETCH_ASSOC);

$title = $task['title'];
$description = $task['description'];
$due_date = $task['due_date'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $newTitle = $_POST['title'];
    $newDesc = $_POST['description'];
    $newDue = $_POST['due_date'];

    $statement = $pdo->prepare("UPDATE simondb.tasks SET title = :title, description = :description, due_date = :due_date WHERE id = :id");

    $statement->bindValue(':title', $newTitle);
    $statement->bindValue(':description', $newDesc);
    $statement->bindValue(':urgency', $newDue);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('Location: ../index.php');

} 

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Add Task</title>
</head>
    <body>

    <h1>Update task: <b><?php echo($task['title'])  ?></b></h1>

        <form action="" method="POST" class="create">
            <input type="text" name="title" required placeholder="New task" value="<?php echo $title; ?>">
            <textarea name="description" placeholder="Description"><?php echo $description; ?></textarea>
            <input type="date" name="due_date" id="" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $due_date; ?>">
            <button type="submit" class="btn">Update</button>
        </form>

        <a href="../index.php">← Go back</a>
    </body>
</html>
        

