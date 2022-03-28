<?php

/**
 * Hae työajat käyttäjän id:n perusteella taulukkoon
 */
function getWorktimes($pid){
    require('db.php');
   
    //Haetaan tiedot ja aikaerot henkilölle
    $sql = "SELECT start_time, end_time, task_description, TIMEDIFF(end_time,start_time) as timediff FROM worktime WHERE person_id=?";
 
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $pid);
    $statement->execute();

    $result = $statement->fetchAll();
 
    echo "<table class='table table-striped'><tr><th>Task</th><th>Start</th><th>End</th><th>Hours</th></tr>";
    //Luodaan yksi taulukon rivi tietokannan rivistä
    foreach($result as $row){ 
        echo "<tr><td>".$row["task_description"]."</td>";
        echo "<td>".$row["start_time"]."</td>";
        echo "<td>".$row["end_time"]."</td>";
        echo "<td>".$row["timediff"]."</td></tr>";
    }
 
    //Haetaan aikojen summa (aikaero->sekunneiksi->sekuntien summa->takaisin kellonajaksi)
    $sql = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(end_time,start_time)))) as sumtime FROM worktime WHERE person_id=?";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $pid);
    $statement->execute();
    $row = $statement->fetch();

    //Tulostetaan laskettu summa viimeisellä rivillä.
    echo "<tr><th>Sum of time</th><th></th><th></th><th>".$row["sumtime"]."</th></tr>";
    echo "</table>";
}
?>