<div class="item">
            
    <span><?php echo $task['title'] ?></span>
    <span class="desc"><?php echo $task['description'] ?></span>
    <span><?php echo $task['urgency'] ?></span>
    <span><?php echo $task['create_date'] ?></span>

    <form style="display: inline-block" action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
        <button class="btn del" type="submit">Delete</button>
    </form>        
    
    <a class="btn" href="update.php?id=<?php echo $task['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>

    
                    
</div>

        

