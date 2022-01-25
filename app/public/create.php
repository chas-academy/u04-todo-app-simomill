<?php
/** @var $pdo \PDO */
require_once "../resources/db.php";

session_start();
$userID = $_SESSION['userID'];

$title = $_POST['title'];
$desc = $_POST['description'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($title) {
        if (isset($_POST['due_date'])) {
            $due_date = $_POST['due_date'];
        } 

        if ($due_date === "") {
            $due_date = null;
        }

        $statement = $pdo->prepare("INSERT INTO simondb.tasks (title, description, 
        due_date, create_date, finnished, userId)
            VALUES (:title, :description, :due_date, :created, :finnished, :userID)");

            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $desc);
            $statement->bindValue(':due_date', $due_date);
            $statement->bindValue(':created', date('Y-m-d H:i:s'));
            $statement->bindValue(':finnished', 0);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            header('Location: read.php');    
    }
}


//------------ HEADER PARTIAL
 require_once '../resources/partials/_head.php'; ?>
 
    <body>
        <main>
            <h1>Create new task</h1>

            <form action="" method="POST" class="create">
                
                <input type="text" name="title" required placeholder="New task">
                
                <textarea name="description" placeholder="Description"></textarea>
                
                <input type="date" name="due_date" id="" 
                min="<?php echo date('Y-m-d'); ?>">
                
                <button class="btn" type="submit">Create</button>
            </form>

            <a href="read.php">← Go back</a>
        </main>
    </body>
</html>  