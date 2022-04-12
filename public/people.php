<?php
include TEMPLATES_DIR."head.php";
include MODULES_DIR."person.php";

$id = filter_input(INPUT_GET, "id");
// If id parameter exists -> delete
if(isset($id)){
    try{
        deletePerson($id);
        echo '<div class="alert alert-success" role="alert">Person deleted!!</div>';
    }catch(Exception $e){
        echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
    }
    
}
// Get all people from database
$people = getPeople();
// Print person list
echo "<ul>";
foreach($people as $p){
    echo "<li>".$p["firstname"]." ".$p["lastname"].'<a href="people.php?id=' . $p["ID"] . '" class="btn btn-primary">Delete</a> </li>';
}
echo "</ul>";

include TEMPLATES_DIR.'foot.php';