<?php
include TEMPLATES_DIR."head.php";
include MODULES_DIR."person.php";


$people = getPeople();

echo "<ul>";
foreach($people as $p){
    echo "<li>".$p["firstname"]." ".$p["lastname"]."</li>";
}
echo "</ul>";

include TEMPLATES_DIR.'foot.php';