<div class="item">       
    <span 
        <?php if ($task['finnished'] === 1) {
                echo 'class="finnished"';
            } ?>>
        <?php echo $task['title'] ?></span>

    <span class="desc <?php if ($task['finnished'] === 1) {
                echo "finnished";
            } ?>">
        <?php echo $task['description'] ?></span>

    <span 
        <?php if ($task['finnished'] === 1) {
                echo 'class="finnished"';
            } ?>>
        <?php echo $task['due_date'] ?></span>

    <form style="display: inline-block" action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
        <button class="btn del small" type="submit">
            <i class="fas fa-times"></i>
        </button>
    </form>   
    
    <a class="btn small" href="update.php?id=<?php echo $task['id'] ?>">
        <i class="fas fa-pencil-alt"></i>
    </a>

    <form action="complete.php" method="post" id="completed_form">
        <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
        <input class="larger" type="checkbox" name="completed" 
        onChange="this.form.submit()"
            <?php if ($task['finnished'] === 1) {
                echo "checked";
            } ?>>
    </form>                    
</div>