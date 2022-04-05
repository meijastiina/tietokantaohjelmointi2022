<?php
include TEMPLATES_DIR.'head.php';
include TEMPLATES_DIR.'person_dropdown.php';
include MODULES_DIR.'worktime.php';


    $personID = filter_input(INPUT_POST, "person", FILTER_SANITIZE_NUMBER_INT);
    $startTime = filter_input(INPUT_POST, "startTime");
    $endTime = filter_input(INPUT_POST, "endTime");
    $taskDescription = filter_input(INPUT_POST, "taskDescription");
        
    if(isset($personID)){
        addWorktime($personID, $startTime, $endTime, $taskDescription);
        echo '<div class="alert alert-success" role="alert">Worktime added!!</div>';
    }

    $selectedID = isset($personID) ? $personID : 0;
?>

    <form action="worktime.php" method="post">
        <?php createPersonDropdown($selectedID); ?>
        <label for="startTime">Start time:</label><br>
        <input type="datetime-local" name="startTime" id="startTime"><br>
        <label for="endTime">End time:</label><br>
        <input type="datetime-local" name="endTime" id="endTime"><br>
        
        <label for="taskDescription">Description:</label>
        <textarea id="taskDescription" name="taskDescription"></textarea><br/>
        <input type="submit" class="btn btn-primary" value="Add worktime">
    </form>

<?php include TEMPLATES_DIR.'foot.php'; ?>




