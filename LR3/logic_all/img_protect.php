<?php
require_once 'db_connect.php';
/*
if($_SESSION['check']==1){
  header('Content-type: image/jpeg');
  imagejpeg(imagecreatefromjpeg('../img/'. $_GET['img']));
}
 else{
    header('Location: ../avtorizacia.php');
}*/
$file = file_get_contents('img/' . $_GET['img'], true);
/*
$img = str_replace('/', '', $_GET['img']);
$img = str_replace('', '', $img);*/

echo $file;

