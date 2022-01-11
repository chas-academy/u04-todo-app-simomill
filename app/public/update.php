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

    $newTitle = $_POST['title'];
    $newDesc = $_POST['description'];
    $newUrgency = $_POST['urgency'];

    $statement = $pdo->prepare("UPDATE simondb.Tasks SET title = :title, description = :description, urgency = :urgency WHERE id = :id");

    $statement->bindValue(':title', $newTitle);
    $statement->bindValue(':description', $newDesc);
    $statement->bindValue(':urgency', $newUrgency);
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
            <textarea name="description" placeholder="Description"><?php echo $description; ?></textarea>
            <select name="urgency" id="" value="<?php echo $urgency; ?>">
                <option disabled>--Choose Urgency--</option>
                
                <option <?php if ("" === $task['urgency']) echo "selected" ?> value="">None</option>
                
                <option <?php if ("Today" === $task['urgency']) echo "selected" ?> value="Today">Today</option>
                
                <option <?php if ("This Week" === $task['urgency']) echo "selected" ?> value="This Week">This Week</option>
                
                <option <?php if ("This Month" === $task['urgency']) echo "selected" ?> value="This Month">This Month</option>
                
                <option <?php if ("This Year" === $task['urgency']) echo "selected" ?> value="This Year">This Year</option>
            </select>
            <button type="submit" class="btn">Update</button>
        </form>

        <a href="index.php">← Go back</a>
    </body>
</html>
        

