<?php

function getPersons(){
    require_once MODULES_DIR.'db.php';

    $pdo = getPdoConnection();
    // Create SQL query to get all rows from a table
    $sql = "SELECT * FROM person";
    // Execute the query
    $people = $pdo->query($sql);

    return $people->fetchAll();
}

function addPerson($fname, $lname, $uname, $pw){
    require_once MODULES_DIR.'db.php'; // DB connection

    //Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
    //Jos parametria ei löydy, funktio palauttaa null
    // $fname = filter_input(INPUT_POST, "fname");
    // $lname = filter_input(INPUT_POST, "lname");
    // $uname = filter_input(INPUT_POST, "username");
    // $pw = filter_input(INPUT_POST, "password");
    
    //Tarkistetaan onko muttujia asetettu
    if( !isset($fname) || !isset($lname) || !isset($uname) || !isset($pw) ){
        echo "Parametreja puuttui!! Ei voida lisätä henkilöä";
        exit;
    }
    
    //Tarkistetaan, ettei tyhjiä arvoja muuttujissa
    if( empty($fname) || empty($lname) || empty($uname) || empty($pw) ){
        echo "Et voi asettaa tyhjiä arvoja!!";
        exit;
    }
    
    try{
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "INSERT INTO person (firstname, lastname, username, password) VALUES (?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $fname);
        $statement->bindParam(2, $lname);
        $statement->bindParam(3, $uname);
    
        $hash_pw = password_hash($pw, PASSWORD_DEFAULT);
        $statement->bindParam(4, $hash_pw);
        
    
        $statement->execute();
    
        echo "Tervetuloa ".$fname." ".$lname.". Sinut on lisätty tietokantaan"; 
    }catch(PDOException $e){
        echo "Käyttäjää ei voitu lisätä<br>";
        echo $e->getMessage();
    }
}

