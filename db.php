<?php

require 'config.php';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
try {
	$pdo = new PDO($dsn, $user, $password);
    echo "Connected!";
} catch (PDOException $e) {
	echo $e->getMessage();
}