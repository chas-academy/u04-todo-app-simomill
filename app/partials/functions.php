 <?php
    
    function task_display($urgency) {
    $tasks = 0;
    
    foreach ($tasks as $i => $task) {
        if ($task['due_date'] === $urgency) {
            $tasks ++ ;   
        }};

    if ($tasks !== 0): ?>
        
        <?php if ($urgency === "Today" || $urgency === "Tomorrow"): ?>
        <h2><?php echo $urgency; ?></h2>

        <div class="item heading">
            <span>Task</span>
            <span>Description</span>
            <span>Due</span>
            <span>Delete</span>
            <span>Edit</span>
            <span>Done</span>  
        </div>
        <?php endif; ?>

    <?php else: ?>
        <h2>Nothing needs to be done today.</h2>
    <?php endif; ?>

    <?php foreach ($tasks as $i => $task) {

        if ($task['due_date'] === $today) {
            require '../partials/_tableLoop.php';
        }
    }
    
    echo '<span class="divider"></span>';
}