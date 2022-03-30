<?php
    require('db.php');

    $uname = filter_input(INPUT_POST, "username");
    $pw = filter_input(INPUT_POST, "password");

    //Tarkistetaan onko muttujia asetettu
    if( !isset($uname) || !isset($pw) ){
        echo "Parametreja puuttui!! Ei voida kirjautua.";
        exit;
    }

    //Tarkistetaan, ettei tyhjiä arvoja muuttujissa
    if( empty($uname) || empty($pw) ){
        echo "Et voi asettaa tyhjiä arvoja!!";
        exit;
    }

    //Lisää tietokantahaku käyttäjänimellä
    //Kokeile verifioida salasana

    try{
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "SELECT * FROM person WHERE username=?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $uname);
        $statement->execute();

        if($statement->rowCount() <=0){
            echo "Käyttäjää ei löydy!!";
            exit;
        }
    
        $row = $statement->fetch();

        if(!password_verify($pw, $row["password"] )){
            echo "Väärä salasana!!";
            exit;
        }

        echo "Tervetuloa ".$row["firstname"]." ".$row["lastname"].". Olet kirjautunut sisään!"; 
    }catch(PDOException $e){
        echo "Kirjautuminen ei onnistunut<br>";
        echo $e->getMessage();
    }

?>