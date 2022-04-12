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

function getWorktimeReport(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = getPdoConnection();
        // Create SQL query to get all rows from a table
        $sql = "SELECT 
        lastname,
        firstname,
        DATE_FORMAT(start_time, '%d.%m.%Y %H:%i') AS start_time_formatted, 
        DATE_FORMAT(end_time, '%d.%m.%Y %H:%i') AS end_time_formatted,
        TIMEDIFF(end_time, start_time) AS duration
    FROM worktime INNER JOIN person ON worktime.person_id= person.ID
    ORDER BY lastname, firstname, start_time;";
        // Execute the query
        $worktime = $pdo->query($sql);

        return $worktime->fetchAll();
    }catch(PDOException $e){
        throw $e;
    }
}
function getMonthlyTotals(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = getPdoConnection();
        // Create SQL query to get all rows from a table
        $sql = "SELECT 
        MONTH(start_time) AS month,
        ROUND(SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time))/3600), 2) AS MonthlyTotalHours
    FROM worktime 
    GROUP BY MONTH(start_time)
    ;";
        // Execute the query
        $monthlyTotals = $pdo->query($sql);

        return $monthlyTotals->fetchAll();
    }catch(PDOException $e){
        throw $e;
    }
}
