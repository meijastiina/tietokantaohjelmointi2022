<?php
include('head.php');
include('person_dropdown.php');

    echo '<form action="add_worktime.php" method="post">';
    
    personDropdown();

    echo'<label for="startTime">Start time:</label><br>
        <input type="datetime-local" name="startTime" id="startTime"><br>
        <label for="endTime">End time:</label><br>
        <input type="datetime-local" name="endTime" id="endTime"><br>
        
        <label for="taskDescription">Description:</label>
        <textarea id="taskDescription" name="taskDescription"></textarea><br/>
        <input type="submit" class="btn btn-primary" value="Add worktime">
    </form>';

include('foot.php');




