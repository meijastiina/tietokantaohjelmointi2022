<?php
require 'db.php'; // DB connection

//Tarkistetaan onko parametreja asetettu
if( !isset($_POST["fname"]) || !isset($_POST["lname"]) ){
    echo "Parametreja puuttui!! Ei voida lisätä henkilöä";
    exit;
}

//Haetaan parametrit muuttujiin. Parametrin nimi tulee lomake-inputin name-atribuutista
$fname = $_POST["fname"];
$lname = $_POST["lname"];

//Tarkistetaan, ettei tyhjiä arvoja muuttujissa
if( empty($fname) || empty($lname) ){
    echo "Et voi asettaa tyhjiä arvoja!!";
    exit;
}

try{
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO person (firstname, lastname) VALUES ('$fname', '$lname')";
    $pdo->exec($sql);
    echo "Tervetuloa ".$fname." ".$lname.". Sinut on lisätty tietokantaan"; 
}catch(PDOException $e){
    echo "Käyttäjää ei voitu lisätä<br>";
    echo $e->getMessage();
}
