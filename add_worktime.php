<?php
require 'db.php'; // DB connection
include 'head.php';

$personID = filter_input(INPUT_POST, "person", FILTER_SANITIZE_NUMBER_INT);
$startTime = filter_input(INPUT_POST, "startTime");
$endTime = filter_input(INPUT_POST, "endTime");
$taskDescription = filter_input(INPUT_POST, "taskDescription");

//Tarkistetaan onko parametreja asetettu
if( !isset($personID) || !isset($startTime) || !isset($endTime) ){
    echo "Parametreja puuttui!! Ei voida lisätä työaikaa";
    exit;
}


//Tarkistetaan, ettei tyhjiä arvoja muuttujissa
if( empty($startTime) || empty($endTime) ){
    echo "Et voi asettaa tyhjiä arvoja!!";
    exit;
}

try{
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO worktime (person_id, start_time, end_time, task_description) VALUES (?,?,?,?)";
    $statement = $pdo->prepare($sql);
    $statement->execute( array($personID, $startTime, $endTime, $taskDescription) );

    echo "Worktime logged<br><br>";
}catch(PDOException $e){
    echo "Unable to add worktime";
    echo $e->getMessage();
}


