<?php

function printTasks() 
{
// --------------------VARIABLES
    global $tasks;
// VARIABLES FOR THE DAYS
    $today = date('Y-m-d');
    $tomorrow = new DateTime('tomorrow');
    $tomorrow = $tomorrow->format('Y-m-d');
    $today_num = intval(str_replace("-", "", $today));
    $tomorrow_num = intval(str_replace("-", "", $tomorrow));

//--------------------------------SORT TASKS INTO CORRESPIONDING ARRAYS
    $over_tasks = [];
    $noday_tasks = [];
    $today_tasks = [];
    $tmrws_tasks = [];
    $later_tasks = [];

    foreach ($tasks as $i => $task) {
        
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

// ------------------------------------OVERDUE SECTION
    if (count($over_tasks) != 0) : ?>

        <h2 class="overdue">Overdue!</h2>
            
        <?php 
        foreach ($over_tasks as $i => $task) {
            require '../resources/partials/_taskLine.php';
        } 
        
        echo '<span class="divider"></span>';
    endif;

// ------------------------------------TODAY SECTION
    if (count($today_tasks) !== 0): ?>

        <h2>Today</h2> 
        
        <?php foreach ($today_tasks as $i => $task) {
        require '../resources/partials/_taskLine.php';
        }

    // SHOW UNSCHEDULED TASKS
        if (count($noday_tasks) != 0) {
            foreach ($noday_tasks as $i => $task) {
                require '../resources/partials/_taskLine.php';
                }
        }

        echo '<span class="divider"></span>';

        else:
            if (count($over_tasks) === 0): ?>
                <h2>Nothing needs to be done today.</h2>
                
                <?php echo '<span class="divider"></span>';
            endif;
    endif;

// ----------------------------------TOMORROW SECTION
    if (count($tmrws_tasks) !== 0): ?>
                
        <h2>Tomorrow</h2>

        <?php foreach ($tmrws_tasks as $i => $task) {
            require '../resources/partials/_taskLine.php';
        }

    //SHOW UNSCHEDULED TASKS (IF THEY ARE NOT ALREADY DISPLAYED)
        if (count($today_tasks) == 0) {
          
            if (count($noday_tasks) != 0) {
                foreach ($noday_tasks as $i => $task) {
                    require '../resources/partials/_taskLine.php';
                    }
            }
        }

        echo '<span class="divider"></span>';

    endif; 

// -----------------------------------------LATER SECTION
    if(count($later_tasks) !== 0): ?>

        <h2>Later</h2>

        <?php foreach ($later_tasks as $i => $task) {
            require '../resources/partials/_taskLine.php';
        }

    // SHOW UNSCHEDULED TASKS - IF THEY ARE NOT ALREADY DISPLAYED
        if (count($today_tasks) == 0 && count($tmrws_tasks) == 0) {
          
            if (count($noday_tasks) != 0) {
                foreach ($noday_tasks as $i => $task) {
                    require '../resources/partials/_taskLine.php';
                    }
            }
        }

        echo '<span class="divider"></span>';

    endif;
}

// -------------------------------
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

    }
}