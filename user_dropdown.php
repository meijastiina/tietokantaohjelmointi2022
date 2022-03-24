<?php

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
        echo '<option value="'. $row["ID"] . '">' . $row["firstname"] . ' ' . $row["lastname"]. '</option>';
    }
    echo "</select><br/>";

}

?>