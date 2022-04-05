<?php

/**
 * Creates a dropdown from database names
 * and sets the selected person by parameter id.
 */
function createPersonDropdown($selectedId = -1){
    include MODULES_DIR.'person.php';

    $people = getPeople();

    echo '<select name="person" id="person">';
        // Loop till there are no more rows
    foreach($people as $p){
        echo '<option value="'
            . $p["ID"] .'"'
            .($p["ID"] == $selectedId ? ' selected' : ''). '>' 
            . $p["firstname"]. ' ' 
            . $p["lastname"]
            .'</option>';
    }
    echo "</select><br/>";
}


?>