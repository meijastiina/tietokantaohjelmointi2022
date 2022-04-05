<?php

    include TEMPLATES_DIR.'head.php';

    //Tarkistetaan onko sessioon asetettu käyttäjä.
    if(isset($_SESSION["username"])){
        echo "<h1>Welcome ".$_SESSION["fname"]." ".$_SESSION["lname"]."</h1>";
    }else{
        echo "<h1>Welcome! You may log in to use advanced features!</h1>";
    }

    include TEMPLATES_DIR.'foot.php';
