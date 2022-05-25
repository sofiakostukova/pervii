<?php 
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/db_connect.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/TablesAvtors.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActionsBooks.php');

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
