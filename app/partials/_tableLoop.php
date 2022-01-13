<div class="item">
            
    <span><?php echo $task['title'] ?></span>
    <span class="desc"><?php echo $task['description'] ?></span>
    <span><?php echo $task['urgency'] ?></span>
    <span><?php echo $task['create_date'] ?></span>

    <form style="display: inline-block" action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
        <button class="btn del small" type="submit">Delete</button>
    </form>        
    
    <a class="btn small" href="update.php?id=<?php echo $task['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>

    <form action="complete.php" method="post" id="completed_form">
        <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
        <input class="larger" type="checkbox" name="completed" onChange="this.form.submit()">
    </form>

    

    
                    
</div>

        

