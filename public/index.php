<?php
    //Käynnistetään sessio
    session_start();
    include('../src/templates/head.php');

    //Tarkistetaan onko sessioon asetettu käyttäjä.
    //Jos ei, ohjataan login-sivulle.
    if(isset($_SESSION["username"])){
        echo "<h1>Welcome ".$_SESSION["fname"]." ".$_SESSION["lname"]."</h1>";
    }else{
        header("Location: login_view.php");
    }

    include('../src/templates/foot.php');
