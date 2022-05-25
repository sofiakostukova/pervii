<?php
class Database
{
    //единственный существующий экземпляр данного класса
	private static $instance = null;

	//экземпляр подключение к бд
	private $connection = null;

	//запрещаем создание нового экземпляра снаружи класса
	protected function __construct(){

		//защита от sql-инъекций более наглядна у
		$this->connection = new \PDO('mysql:host=localhost;dbname=chitai_gorod2', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false]);
	}

	//запрещаем клонирование
	protected function __clone(){}

	//запрещаем десереализацию
	public function __wakeup(){
		throw new \BadMethodCallException("Unable to desearilize database connection");
	}

	//создает экземпляр класса, хранящий подключение к бд
	public static function getInstance() : Database{
		if(null === self::$instance){
			self::$instance = new static();
		}
		return self::$instance;
	}

	//экземпляр подключения к бд
	public static function connection() : \PDO{
		return static::getInstance()->connection;
	}

	//подготовленное выражение
	public static function prepare($statement): \PDOStatement{
		return static::connection()->prepare($statement);
	}

	//id последней добавленной записи
	public static function lastInsertId(): int{
		return intval(static::connection()->lastInsertID());
	}
}
