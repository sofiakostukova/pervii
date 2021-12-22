<?php
require_once 'class.php';
require_once 'database.php';


$obj = new clas();
$conn = new database();
$obj->getconnectdb($conn->connect());


$books['name_of_books'] = htmlspecialchars($_POST['name_of_books']);
$books['name_of_avtors'] = htmlspecialchars($_POST['name_of_avtors']);
$books['annotation'] = htmlspecialchars($_POST['annotation']);
$books['price'] = htmlspecialchars($_POST['price']);


if(isset($_POST['creating'])||(isset($_POST['editing']))) {
    $erroscheck=0;

    if ($books['name_of_books'] == "") {
        $arrayerrors['errbooks'] = 'Заполните название книги';
        $erroscheck++;
    }

    if ($books['name_of_avtors'] == "0") {
        $arrayerrors['erravtors'] = 'Выберите автора';
        $erroscheck++;
    }

    if ($books['annotation'] == "") {
        $arrayerrors['errannotation'] = 'Заполните описание книги';
        $erroscheck++;
    }

    if ($books['price'] == "" && $books['price'] != 0) {
        $arrayerrors['errprice'] = 'Введите цену книги';
        $erroscheck++;
    }

    $checkimg = $obj->checkfile($_FILES['img_books']);

    var_dump($_FILES['img_books']);

    if ($checkimg != "ок") {
        $arrayerrors['errimg'] = $checkimg;
        $erroscheck++;
    }

    if ((isset($_POST['creating'])) && $erroscheck == 0) {
        $obj->insert($books['name_of_books'], $books['name_of_avtors'], $books['annotation'], $books['price'], $_FILES['img_books']);
    }

    if ((isset($_POST['editing'])) && $erroscheck == 0) {
        $id_books = $_POST['idbooks'];
        $img_name = $_POST['imgname'];
        $obj->update($id_books, $img_name, $books['name_of_books'], $books['name_of_avtors'], $books['annotation'], $books['price'], $_FILES['img_books']);
    }
}
if(isset($_POST['deleting'])){
    $id = htmlspecialchars($_POST['idbooks']);
    $image = htmlspecialchars($_POST['imgname']);
    $obj->delete($id,$image);
}