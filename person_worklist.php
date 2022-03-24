<?php
    include 'head.php';
    include 'worktime_table.php';

    //Luodaan lomake henkilöiden vetovalikolla.
    //Kaavake kutsuu sivua uudelleen valitun henkilön id:llä
    echo "<form action='person_worklist.php' method='post'>";
    include 'user_dropdown.php';
    echo "<input type='submit' value='Get work list'></form>";
 
    //Jos henkilön id asetettu post-parametriksi, haetaan tiedot taulukkoon
    $personID = filter_input(INPUT_POST, "person", FILTER_SANITIZE_NUMBER_INT);
    if(isset($personID)){
        getWorktimes($personID);
    }

    include 'foot.php';
?>