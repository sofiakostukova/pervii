<?php 
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/db_connect.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/TablesBooks.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActionsAvtors.php');


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

				if($arr !== null) $img = $arr[0]['img'];

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
                            $allowedimgExtensions = array('jpg', 'gif', 'png', 'jpeg', 'ico');
                            
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
