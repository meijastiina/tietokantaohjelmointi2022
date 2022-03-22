<?php
require 'db.php'; // DB connection

//Tarkistetaan onko parametreja asetettu
if( !isset($_POST["person"]) || !isset($_POST["startTime"]) || !isset($_POST["endTime"]) ){
    echo "Parametreja puuttui!! Ei voida lisätä työaikaa";
    exit;
}

//Haetaan parametrit muuttujiin. Parametrin nimi tulee lomake-inputin name-atribuutista
$personID = $_POST["person"];
$startTime = $_POST["startTime"];
$endTime = $_POST["endTime"];
$taskDescription = $_POST["taskDescription"];


//Tarkistetaan, ettei tyhjiä arvoja muuttujissa
if( empty($startTime) || empty($endTime) ){
    echo "Et voi asettaa tyhjiä arvoja!!";
    exit;
}

try{
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO worktime (person_id, start_time, end_time, task_description) VALUES ('$personID', '$startTime', '$endTime', '$taskDescription')";
    $pdo->exec($sql);
    echo "Worktime logged"; 
}catch(PDOException $e){
    echo "Unable to add worktime";
    echo $e->getMessage();
}
