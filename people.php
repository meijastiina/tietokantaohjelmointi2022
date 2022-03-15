<?php

// Get DB connection
require 'db.php';
// Create SQL query to get all rows from a table
$sql = "SELECT * FROM person";
// Execute the query
$people = $pdo->query($sql);
// Check if any was returned
if ( $people->rowCount() > 0 ){
    echo "<ul>";
    // Loop till there are no more rows
    while ( $row = $people->fetch() ) {
        // Echo the data
        echo "<li>" . $row["firstname"] . "</li>";
    }
    echo "</ul>";
}