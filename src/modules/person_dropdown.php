<?php

/**
 * Creates a dropdown from database names
 * and sets the selected person by parameter id.
 */
function personDropdown($selectedId = -1){
    // Get DB connection
    require 'db.php';
    // Create SQL query to get all rows from a table
    $sql = "SELECT ID, firstname, lastname FROM person";
    // Execute the query
    $people = $pdo->query($sql);

    // Check if any was returned and create 
    if ( $people->rowCount() > 0 ){
        echo '<label for="person">Select person:</label>
        <select name="person" id="person">';

        // Loop till there are no more rows
        foreach($people as $row){
            echo '<option value="'
                . $row["ID"] .'"'
                .($row["ID"] == $selectedId ? ' selected' : ''). '>' 
                . $row["firstname"]. ' ' 
                . $row["lastname"]
                .'</option>';
        }
        echo "</select><br/>";
    }
}


?>