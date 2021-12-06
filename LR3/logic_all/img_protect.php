<?php
require_once 'db_connect.php';

if($_SESSION['check']==1){
  header('Content-type: image/jpg');
  imagejpeg(imagecreatefromjpeg('../img/'. $_GET['img']));
}
 else{
    header('Location: ../avtorizacia.php');
}
 ?>

