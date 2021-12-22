<?php
require_once ('db_connect.php');


class clas{
    
    private $connect;

function  getconnectdb($db){
        $this->connect = $db;
}


public function showData(){
        $query = "select books.id, books.img, books.name, books.description, books.cost, avtors.name1
        from books
        inner join avtors on books.id_avtors = avtors.id 
        where books.id";

    
$q = $this->connect->prepare($query) or die("Ошибка чтения записей");
    
$q->execute();
    
$r = $q->fetchALL(PDO::FETCH_NUM);
    
return $r;
}

public function getById($id){
    $query = "select books.id, books.img, books.name, books.description, books.cost, avtors.name1, avtors.id
        from books
            
        inner join avtors on books.id_avtors = avtors.id 
        where books.id = :id";

$q = $this->connect->prepare($query);
    
$q->execute(array(':id'=>$id));
    
$data = $q->fetchALL(PDO::FETCH_NUM);

if($data){
    return $data;}
else{
    return "Ошибка чтения по id";}
}



public function update($id, $img_name, $namebook, $avtor, $annotationbook, $pricebook, $file){

$sql = "UPDATE books SET img=:imgnew, name=:namebook, id_avtors=:avtor, description=:annotationbook, cost=:pricebook where books.id = $id";
    
$q = $this->connect->prepare($sql);
    
unlink($_SERVER['DOCUMENT_ROOT']. "/img/" . $img_name);
    
$imgnew = $this->uploadfile($file);
    
$q->execute(array(':imgnew'=>$imgnew,':namebook'=>$namebook, ':avtor'=>$avtor,':annotationbook'=>$annotationbook, ':pricebook'=>$pricebook));

//var_dump($img_name);

    if($q){
        header('location: ../table.php');}
    else{
        return '<script>alert("Произошла ошибка обращения к базе данных")</script>';
        header('location: ../index.php');}
}


public function insert($namebook, $avtor, $annotationbook, $pricebook, $file)
{

    $sql = "INSERT INTO books SET img=:imgnew, name=:namebook, id_avtors=:avtor, description=:annotationbook, cost=:pricebook";
    
    $q = $this->connect->prepare($sql);
    
    $imgnew = $this->uploadfile($file);
   
    $q->execute(array(':imgnew'=>$imgnew,':namebook'=>$namebook, ':avtor'=>$avtor,':annotationbook'=>$annotationbook, ':pricebook'=>$pricebook));
    
    if ($q) {
        header('location: ../table.php');
    } else {
        return '<script>alert("Произошла ошибка обращения к базе данных")</script>';
    }
}


public function delete($id, $img_name){
$sql="DELETE FROM books WHERE id=:id";
    
$q = $this->connect->prepare($sql);
    
$q->execute(array(':id'=>$id));
    
unlink($_SERVER['DOCUMENT_ROOT']. "/img/" . $img_name);

//var_dump($img_name);

if($q){
header('location: ../table.php');}
else{
    return '<script>alert("Произошла ошибка удаления из базы данных")</script>';
}
}

    public function checkfile($file){
        if($file['name'] == '')
            return 'Выберете картинку';
        if($file['size'] == 0)
            return 'Картинка очень большая или отсутсвует';
        
        $getMime = explode('.', $file['name']);
        
        $mime = strtolower(end($getMime));
        
        $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
        if(!in_array($mime, $types))
            return 'Недопустимый тип файла';

        return 'ок';
    }



   public function uploadfile($file){
        $name = mt_rand(0, 999) . $file['name'];
       
        copy($file['tmp_name'], 'img/' . $name);
       
        return $name;
    }
    
public function getavtors(){
    $sql = "select * from avtors";
    
    $avtors = $this->connect->prepare($sql);
    
    $avtors->execute();
    
    $row = $avtors->fetchALL(PDO::FETCH_ASSOC);
    
    if($row){
   return $row;}
    else{
        return "Таблица с авторами пуста";
    }
}
}
