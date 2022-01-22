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
        <main>
            <h1>Create new task</h1>

            <form action="create.php" method="POST" class="create">
                <input type="text" name="title" required placeholder="New task" value="
                    <?php if (isset($_POST['title'])){
                        echo $_POST['task_name'];
                    }
                    ?>">
                <textarea name="description" placeholder="Description" value="
                    <?php if (isset($_POST['description'])){
                        echo $_POST['description']; 
                    }
                    ?>"> </textarea>
                <input type="date" name="due_date" id="" min="
                    <?php echo date('Y-m-d'); ?>">
                <button class="btn" type="submit">Create</button>
            </form>

            <a href="read.php">← Go back</a>
        </main>
    </body>
</html>  