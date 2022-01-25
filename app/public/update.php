<?php
/** @var $pdo \PDO */
require_once "../resources/db.php";

// -------------------VARIABLES AND SELECTION OF SPECIFIC TASK

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM simondb.tasks WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$task = $statement->fetch(PDO::FETCH_ASSOC);

$title = $task['title'];
$description = $task['description'];
$due_date = $task['due_date'];

// ------------------SQL COMMANDS TO UPDATE THE TASK IN THE DATABASE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $newTitle = $_POST['title'];
    $newDesc = $_POST['description'];
    $newDue = $_POST['due_date'];

    $statement = $pdo->prepare("UPDATE simondb.tasks SET title = :title, 
    description = :description, due_date = :due_date WHERE id = :id");

    $statement->bindValue(':title', $newTitle);
    $statement->bindValue(':description', $newDesc);
    $statement->bindValue(':due_date', $newDue);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('Location: read.php');
}

// ------------------------HTML FOR THE UPDATE PAGE
require_once '../resources/partials/_head.php'; 
?>
    <body class="update">

        <h1>Update task: <br> "<?php echo($task['title'])  ?>"</h1>

        <form action="" method="POST" class="create">
            <input type="text" name="title" required placeholder="New task" 
            value="<?php echo $title; ?>">
            
            <textarea name="description" placeholder="Description">
                <?php echo $description; ?>
            </textarea>
            
            <input type="date" name="due_date" id="" 
            min="<?php echo date('Y-m-d'); ?>" 
            value="<?php echo $due_date; ?>">
            
            <button type="submit" class="btn">Update</button>
        </form>

        <a href="read.php">← Go back</a>
    </body>
</html>