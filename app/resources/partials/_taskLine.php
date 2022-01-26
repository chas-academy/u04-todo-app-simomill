<!-- CREATES A DIV FOR EACH TASK ----------------------->
<!-- AND MODIFIES THE OUTPUT --------------------------->
<!-- DEPENDING ON WETHER THE  -------------------------->
<!-- TASK IS FINNISHED OR NOT --------------------------> 

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
            <span class="iconify" data-icon="ci:calendar-calendar"></span>
        <?php if ($task['due_date'] === null) {
            echo "No deadline";
        } else {
            echo "\n" . $task['due_date'];
        } ?>
    </span>

    <!-- ------------FUNCTIONALITY TO DELETE TASK--------------- -->
    <form style="display: inline-block" action="delete.php" method="post"
    class="deleteForm">
        
        <input type="hidden" name="id" value="<?php echo $task['id'] ?>">  
        
        <button class="del small" type="submit">
            <i class="fas fa-times<?php if ($task['finnished'] === 1) {
                echo " finnished_btn";
            } ?>"></i>
        </button>

    </form>   
    
    <!-- -------------FUNCTIONALITY TO EDIT TASK----------------------------- -->
    <a class="" href="update.php?id=<?php echo $task['id'] ?>">
        <i class="fas fa-pencil-alt<?php if ($task['finnished'] === 1) {
            echo " finnished_btn";} ?>"></i>
    </a>

    <!-- -------------FUNCTIONALITY TO COMPLETE TASK---------------- -->
    <form action="complete.php" method="post" id="completed_form">
        
        <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
        
        <input class="larger" type="checkbox" name="completed" 
        onChange="this.form.submit()"
            <?php if ($task['finnished'] === 1) {
                echo "checked";
            } ?>>
    </form>                    
</div>