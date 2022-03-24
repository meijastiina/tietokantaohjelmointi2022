<?php
require 'db.php'; // DB connection

//Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
//Jos parametria ei löydy, funktio palauttaa null
$fname = filter_input(INPUT_POST, "fname");
$lname = filter_input(INPUT_POST, "lname");

//Tarkistetaan onko muttujia asetettu
if( !isset($fname) || !isset($lname) ){
    echo "Parametreja puuttui!! Ei voida lisätä henkilöä";
    exit;
}

//Tarkistetaan, ettei tyhjiä arvoja muuttujissa
if( empty($fname) || empty($lname) ){
    echo "Et voi asettaa tyhjiä arvoja!!";
    exit;
}

try{
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO person (firstname, lastname) VALUES (?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $fname);
    $statement->bindParam(2, $lname);

    $statement->execute();

    echo "Tervetuloa ".$fname." ".$lname.". Sinut on lisätty tietokantaan"; 
}catch(PDOException $e){
    echo "Käyttäjää ei voitu lisätä<br>";
    echo $e->getMessage();
}
