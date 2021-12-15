<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

try {
$connection = new PDO("mysql:host=localhost; dbname=chitai_gorod; charset=utf8", "root", '');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $z){
echo $z->getMessage();
}

//var_dump($connection);

if(!$connection){
    die("Error connect to database");
}
