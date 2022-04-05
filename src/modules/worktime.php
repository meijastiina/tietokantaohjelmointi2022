<?php

function addWorktime($personID, $startTime, $endTime, $taskDescription){
    require_once MODULES_DIR.'db.php'; // DB connection

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
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "INSERT INTO worktime (person_id, start_time, end_time, task_description) VALUES (?,?,?,?)";
        $statement = $pdo->prepare($sql);
        $statement->execute( array($personID, $startTime, $endTime, $taskDescription) );

        echo "Worktime logged<br><br>";
    }catch(PDOException $e){
        echo "Unable to add worktime";
        echo $e->getMessage();
    }

}
