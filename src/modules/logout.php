<?php

//Käynnistetään, tyhjennetään ja tuhotaan nykyinen sessio.
session_start();
session_unset();
session_destroy();

//Ohjataan takaisin etusivulle
header("Location: ../../public/index.php")

?>