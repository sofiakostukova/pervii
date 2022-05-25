<?php 
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/db_connect.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/TablesAvtors.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/TablesBooks.php');
// require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActions.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActionsAvtors.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActionsBooks.php');


$NameAvtors = avtorsActions::viewAll();
//var_dump($NameAvtors);

$prev_page = (empty($_SERVER['HTTP_REFERER']))?"":$_SERVER['HTTP_REFERER'];

if(str_contains($prev_page, "Edit_Books.php") && isset($_POST['idbook'])){
    $idbook = $_POST['idbook'];
    booksActions::update($idbook);
}

if(str_contains($prev_page, "Edit_Avtors.php") && isset($_POST['id'])){
	$id = (int)$_POST['id'];
	$name1 = $_POST['name1'];
	avtorsActions::update($id, $name1);
} 

if(str_contains($prev_page, "Create_Books.php")){
	booksActions::insert();
}

if(str_contains($prev_page, "Create_Avtors.php")){
	avtorsActions::insert();
}

if(str_contains($prev_page, "books.php")){

	if('GET' == $_SERVER['REQUEST_METHOD'] && isset($_GET['data-id-item']) && $_GET['data-id-item'] < 0){
        
		$idbook = abs($_GET['data-id-item']);
		$arr = books::getImage($id);
		$img_path = $_SERVER['DOCUMENT_ROOT'] . ''.$arr[0]["img"];

		//var_dump($img_path);

		//unlink($img_path);
		booksActions::delete($idbook);
		header(header:"Location:../books.php");
		die();
	}	
}
if(str_contains($prev_page, "avtors.php")){

	if('GET' == $_SERVER['REQUEST_METHOD'] && isset($_GET['data-id-item']) && $_GET['data-id-item'] < 0){
		$id = abs($_GET['data-id-item']);
		avtorsActions::delete($id);

		echo $id;
		header(header:"Location:../avtors.php");
		die();
	}	
}