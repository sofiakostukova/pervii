<?php 
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/db_connect.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/Tables.php');


class booksActions{
	public static $message = "";

	public static function getMessage(){
		return self::$message;
	}

	public static function viewAll($filter = 'no'){
		if(is_numeric($filter))
			$array = books::selectAll((int)$filter);

		else
			$array = books::selectAll(-1);

		if($array === null){
			self::$message .= "ОШИБКА: не удалось извлечь данные из books";
			return null;
		}
		return $array;
	}

	public static function insert(){
		if('POST' != $_SERVER['REQUEST_METHOD']){
			return null;
		}

		if(!empty($_POST)){
			$name = self::checkData($_POST['name'], 'text');
			$avtor = ($_POST['avtor'] != 0) ? $_POST['avtor'] : 1;
            $description = self::checkData($_POST['description'], 'text');
			$cost = $_POST['cost'];

			if (is_uploaded_file($_FILES['img']['tmp_name']) && $_FILES['img']['error'] === UPLOAD_ERR_OK){
				$img = self::checkData($_FILES['img'], 'file');

				if($img === null){
					self::$message .= "Ошибка загрузки ";
					return null;
				}
			}

			else {
				self::$message .= "ОШИБКА: Файл слишком большой ".$_FILES['img']['error'];
				return null;
			}

			try{
				if(!books::insert($img, $name, $avtor, $description, $cost)){
					self::$message .= "ОШИБКА:<br>".PDO::errorInfo();
					return null;
				}
				self::$message = "Запись добавлена";
				return true;
			}

			catch(Exception $e){
				self::$message .= "ОШИБКА:<br>".$e;
			}
		}
	}

	public static function update($idbook){
		if('POST' != $_SERVER['REQUEST_METHOD']){
			return null;
		}

		if(!empty($_POST)){
			$name = self::checkData($_POST['name'], 'text');
			$avtor = $_POST['avtor'];
			$description = self::checkData($_POST['description'], 'text');
			$cost = $_POST['cost'];

			if(!($_FILES['img']['error'] === UPLOAD_ERR_NO_FILE)){

				if (is_uploaded_file($_FILES['img']['tmp_name']) && $_FILES['img']['error'] === UPLOAD_ERR_OK){
					$img = self::checkData($_FILES['img'], 'file');

					if($img === null){
						self::$message .= "ОШИБКА ЗАГРУЗКИ ФАЙЛА ";
						return null;
					}
					$arr = books::getImage($idbook);
					$img_path = $_SERVER['DOCUMENT_ROOT'] . '/2LR1/'.$arr[0]["img"];
					//unlink($img_path);
				}

				else {
					self::$message .= "ОШИБКА: Файл слишком большой ".$_FILES['img']['error'];
					return null;
				}
			}

			else{
				$arr = books::getImage($idbook);

				if($arr !== null)
                    $img = $arr[0]['img'];

				else{
					self::$message .= "Картинка не найдена";
					return null;
				}
			}

			try{
				if(!books::update($idbook, $img, $name, $avtor, $description, $cost)){
					self::$message .= "Ошибка:<br>".PDO::errorInfo();
					return null;
				}
				self::$message = "Запись изменена";
				return true;
			}

			catch(Exception $e){
				self::$message .= "Ошибка:<br>".$e;
			}
		}
	}

	public static function delete($idbook){
		try{

			if(!books::delete($idbook)){
				self::$message .= "ОШИБКА:<br>".PDO::errorInfo();
				return null;
			}
			self::$message = "Запись удалена";
			return true;
		}

		catch(Exception $e){
			self::$message .= "ОШИБКА:<br>".$e;
		}
	}


	public static function fillEdit($idbook){
		$record = books::getById($idbook);
		return $record[0];
	}

	public static function checkData($check, $name1){

		switch($name1){
			case 'text':
				$check = strip_tags($check);
				return $check;
			break;

			case "file":
				if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK){
							$imgTmpPath = $_FILES['img']['tmp_name'];
							$imgName = $_FILES['img']['name'];
							$imgSize = $_FILES['img']['size'];
							$imgNameCmps = explode(".", $imgName);
	    					$imgExtension = strtolower(end($imgNameCmps));
							$newImgName = substr(md5(time() . $imgName), 0, 15) . '.' . $imgExtension;

							if (in_array($imgExtension, $allowedimgExtensions)) {
								$uploadImgDir = $_SERVER['DOCUMENT_ROOT'] . '/img/';
								$dest_path = $uploadImgDir . $newImgName;

								if(!move_uploaded_file($imgTmpPath, $dest_path))
								{
								  self::$message .='Не удалось переместить файл ';
								}

								$dest_path = ''.$newImgName;
								return $dest_path;
							}
							else{ 
								self::$message .= 'Недопустимый формат файла ';
								return null;
							} 
				}
				else if(isset($_FILES['img']) && $_FILES['img']['error'] !== UPLOAD_ERR_OK){
					self::$message .= "Ошибка загрузки файла ".$_FILES['img']['error'];
					return null;
				} 
			break;
		}
	}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class avtorsActions{

	public static $message = "";

	public static function getMessage(){
		return self::$message;
	}

	public static function viewAll(){

		try{
			$array = avtors::getAvtorsName();
		}

		catch(Exception $e){
			self::$message .= "ОШИБКА:<br>".$e;
		}

		if($array === null){
			self::$message .= "ОШИБКА: не удалось извлечь данные из avtors";
			return null;
		}
		return $array;
	}

	public static function update($id, $name1){

		if('POST' != $_SERVER['REQUEST_METHOD']){
			return null;
		}

		if(!empty($_POST)){
			$name1 = self::checkData($_POST['name1']);
			
			try{

				if(!avtors::update($id, $name1)){
					self::$message .= "ОШИБКА:<br>".PDO::errorInfo();
					return null;
				}
				self::$message = "Запись изменена";
				return true;
			}

			catch(Exception $e){
				self::$message .= "ОШИБКА:<br>".$e;
			}
		}
	}

	public static function insert(){
		if('POST' != $_SERVER['REQUEST_METHOD']){
			return null;
		}

		if(!empty($_POST)){
			$name1 = self::checkData($_POST['name1']);

			try{

				if(!avtors::insert($name1)){
					self::$message .= "ОШИБКА:<br>".PDO::errorInfo();
					return null;
				}
				self::$message = "Запись добавлена";
				return true;
			}

			catch(Exception $e){
				self::$message .= "ОШИБКА:<br>".$e;
			}
		}
	}

	public static function delete($id){

		try{

			if(!avtors::delete($id)){
				self::$message .= "ОШИБКА:<br>".PDO::errorInfo();
				return null;
			}
		}

		catch(Exception $e){
			self::$message .= "ОШИБКА:<br>".$e;
		}
		self::$message = "Запись удалена";
		return true;
	}

	public static function fillEdit($id){
		$record = avtors::getById($id);
		return $record[0];
	}

	public static function checkData($check){
		$check = strip_tags($check);
		return $check;	
	}
}






$NameAvtors = avtorsActions::viewAll();
//var_dump($NameAvtors);

$prev_page = (empty($_SERVER['HTTP_REFERER']))?"":$_SERVER['HTTP_REFERER'];

if(str_contains($prev_page, "Edit_Books.php") && isset($_POST['idbook'])){
    $id = $_POST['idbook'];
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