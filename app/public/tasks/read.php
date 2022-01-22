<?php
/** @var $pdo \PDO */
require_once "../../db.php";
require_once 'functions.php';

session_start();
$userID = $_SESSION['userID'];

$statement = $pdo->prepare('SELECT * FROM simondb.tasks WHERE 
userID = :userID ORDER BY create_date DESC');
$statement->bindValue(':userID', $userID);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

$today = date('Y-m-d');
$tomorrow = new DateTime('tomorrow');
$tomorrow = $tomorrow->format('Y-m-d');

$today_num = intval(str_replace("-", "", $today));
$tomorrow_num = intval(str_replace("-", "", $tomorrow));

require_once '../../partials/_head.php';
?>

    <body>
        <main>
            <h1>TODO<i class="fas fa-tasks"></i>R</h1>

            <div class="logout-container">
                <a class="log-link" href="../index.php">Log out 
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            
            <a href="add.php" class="add btn">Add Task</a>

            <!-- Print Start -->
            <?php printTasks(); ?>
            <!-- Print ending -->
        </main>
    </body>
</html>