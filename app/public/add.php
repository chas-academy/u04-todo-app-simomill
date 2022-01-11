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
        <form action="create.php" method="POST" class="create">
            <input type="text" name="title" placeholder="New task" value="<?php if (isset($_POST['title'])){
                echo $_POST['task_name'];
                }
                ?>">
            <textarea name="description" placeholder="Description"  value="<?php if (isset($_POST['description'])){
                echo $_POST['description']; 
                }
                ?>"> </textarea>
            <select name="urgency" id="">
                <option class="urgencyLevel" selected disabled>--Choose Urgency--</option>
                <option value="">None</option>
                <option value="Today">Today</option>
                <option value="This Week">This Week</option>
                <option value="This Month">This Month</option>
                <option value="This Year">This Year</option>
            </select>
            <button type="submit">Create</button>
        </form>

        <a href="index.php">← Go back</a>
    </body>
</html>
    