<?php
// DB connection
require 'db.php';
// Create SQL query
$sql = "INSERT INTO person (firstname, lastname) VALUES ('Mikko', 'Mallikas'), ('Testi', 'Testeri')";
// Execute the query
$numberOfInserted = $pdo->exec($sql);
// Print out the message
echo "Inserted " . $numberOfInserted . " rows.";