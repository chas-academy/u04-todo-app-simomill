<?php
require_once "../resources/db.php";
require_once '../resources/functions.php';

session_start();
$userID = $_SESSION['userID'];
$username = $_SESSION['username'];
$username = $username;
$userID = $userID;

//----------COLLECT TASKS OF THE LOGGED IN USER
$statement = $pdo->prepare('SELECT * FROM simondb.tasks WHERE 
userID = :userID ORDER BY create_date DESC');
$statement->bindValue(':userID', $userID);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

// ----------HEADER-PARTIAL
require_once '../resources/partials/_head.php';
?>

    <body>
        <main>
            <h1>TODO<i class="fas fa-tasks"></i>R</h1>

            <div class="logout-container">
                <p class="user"><i class="fas fa-user"></i><?php echo "\n" . $username; ?></p>

                <a class="log-link" href="index.php">Log out 
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            
<!-- ---------FUNCTIONALITY TO ADD A NEW TASK------------- -->
            <a href="create.php" class="add btn">Add Task</a>

<!-- ----------PRINT OUT TASK LINES--------------- -->
            <?php printTasks(); ?>
            
        </main>
    </body>
</html>