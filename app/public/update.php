<?php

/** @var $pdo \PDO */
require_once "../db.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM simondb.Tasks WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$task = $statement->fetch(PDO::FETCH_ASSOC);

$title = $task['title'];
$description = $task['description'];
$urgency = $task['urgency'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $urgency = $_POST['urgency'];

    $statement = $pdo->prepare("UPDATE simondb.Tasks SET title = :title, description = :description, urgency = :urgency WHERE id = :id");

    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':urgency', $urgency);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('Location: index.php');

} 

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Task</title>
</head>
    <body>

    <h1>Update task: <b><?php echo($task['title'])  ?></b></h1>

        <form action="" method="POST" class="create">
            <input type="text" name="title" required placeholder="New task" value="<?php echo $title; ?>">
            <textarea name="description" placeholder="Description" value="<?php echo $description; ?>"></textarea>
            <select name="urgency" id="" required value="<?php echo $urgency; ?>">
                <option selected disabled>--Choose Urgency--</option>
                <option value="">None</option>
                <option value="Today">Today</option>
                <option value="This Week">This Week</option>
                <option value="This Month">This Month</option>
                <option value="This Year">This Year</option>
            </select>
            <button type="submit" class="btn">Update</button>
        </form>

        <a href="index.php">← Go back</a>
    </body>
</html>
        

