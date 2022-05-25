<?php 

class avtors{

	public static function getAvtorsName(){

		$query = Database::prepare("SELECT * 
		                            FROM avtors 
		                            ORDER BY avtors.id");

		if(!$query->execute()){
			throw new PDOException("При чтении возникла ошибка(avtors)");
			return false;
		}

		$name1 = $query->fetchAll();

		if(!count($name1)){
			return false;
		}

		return $name1;
	}

	public static function insert(string $name1){
		$query =  Database::prepare('INSERT INTO avtors (name1) VALUES (:name1);');
		$query->bindValue(":name1", $name1);

		if(!$query->execute()){
			throw new PDOException("При добавлении записи возникла ошибка(avtors)");
			return false;
		}
		return true;
	}

	public static function getById($id){
		$query = Database::prepare('SELECT * FROM avtors WHERE avtors.id=:id;');
		$query->bindValue(":id", $id);
		$query->execute();
		$name1 = $query->fetchAll();

		if(!count($name1)){
			return null;
		}
		return $name1;
	}

	public static function update(int $id, string $name1){
		$query =  Database::prepare('UPDATE avtors SET name1 = :name1 WHERE avtors.id = :id;');
		$query->bindValue(":name1", $name1);
		$query->bindValue(":id", $id);

		if(!$query->execute()){
			throw new PDOException("При добавлении записи возникла ошибка(avtors)");
			return false;
		}
		return true;
	}
    
	public static function delete($id){
		$query = Database::prepare('DELETE FROM avtors WHERE avtors.id= :id');
		$query->bindValue(":id", $id);
        
		if(!$query->execute()){
			throw new PDOException("При удалении записи возникла ошибка(avtors)");
			return false;
		}
		return true;
	}
}