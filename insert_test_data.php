<?php
// DB connection
require 'db.php';
// Create SQL query

if(isset($_POST["info"])){
    $info = $_POST["info"];
}



echo "<h1>".$info."</h1>";

$sql = "INSERT INTO person (firstname, lastname) VALUES ('$fname', '$lname')";
// Execute the query
$numberOfInserted = $pdo->exec($sql);
// Print out the message
echo "Inserted " . $numberOfInserted . " rows.";