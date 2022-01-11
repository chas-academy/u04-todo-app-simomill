<div class="item">
            
    <span><?php echo $task['title'] ?></span>
    <span><?php echo $task['description'] ?></span>
    <span><?php echo $task['urgency'] ?></span>
    <span><?php echo $task['create_date'] ?></span>

            
    
    <a href="edit.php?id=<?php echo $task['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>

    <form style="display: inline-block" action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
        <button type="submit">Delete</button>
    </form>
                    
</div>

        

