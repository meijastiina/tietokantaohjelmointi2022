<?php
    include 'head.php';
    include 'worktime_table.php';
    include 'person_dropdown.php';

    //Haetaan henkilön ID post-parametreista (jos asetettu)
    $personID = filter_input(INPUT_POST, "person", FILTER_SANITIZE_NUMBER_INT);

    //Luodaan lomake henkilöiden vetovalikolla.
    //Submit kutsuu sivua uudelleen valitun henkilön id:llä
    echo "<form action='person_worklist.php' method='post'>";

    personDropdown($personID);
    
    echo "<input type='submit' value='Get work list'></form>";
 
    //Haetaan henkilön työajat tauluun, jos ID asetettu
    if(isset($personID)){
        getWorktimes($personID);
    }

    include 'foot.php';
?>