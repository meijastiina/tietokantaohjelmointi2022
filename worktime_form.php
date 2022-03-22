<?php
include('head.php');
    echo '<form action="addworktime.php" method="post">';
    // Get users from DB to a dropdown list
    // Get DB connection
    require 'db.php';
    // Create SQL query to get all rows from a table
    $sql = "SELECT ID, firstname, lastname FROM person";
    // Execute the query
    $people = $pdo->query($sql);
    // Check if any was returned

    if ( $people->rowCount() > 0 ){
        echo '<label for="person">Select person:</label>
        <select name="person" id="person">';
        // Loop till there are no more rows
        foreach($people as $row){
            echo '<option value="'. $row["ID"] . '">' . $row["firstname"] . ' ' . $row["lastname"]. '</option>';
        }
        echo "</select><br/>";

    }

    echo'<label for="startTime">Start time:</label><br>
        <input type="datetime-local" name="startTime" id="startTime"><br>
        <label for="endTime">End time:</label><br>
        <input type="datetime-local" name="endTime" id="endTime"><br>
        
        <label for="taskDescription">Description:</label>
        <textarea id="taskDescription" name="taskDescription"></textarea><br/>
        <input type="submit" class="btn btn-primary" value="Add worktime">
    </form>';
include('foot.php');