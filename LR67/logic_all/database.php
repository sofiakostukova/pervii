<?php

class database
{

    function connect(){
        try{
            $db = new PDO("mysql:host=localhost;dbname=chitai_gorod;charset=utf8", "root", '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
        catch(PDOException $z){
            echo $z->getMessage();
        }
        return $db;
    }

}