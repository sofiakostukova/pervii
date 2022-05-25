<?php 

class books
{
	public static function selectAll($filter){
		if($filter < 0)
			$query = Database::prepare('SELECT books.idbook, books.img, books.name, avtors.name1, books.description, books.cost 
			                            FROM books INNER JOIN avtors 
			                            ON avtors.id=books.id_avtors 
			                            ORDER BY books.idbook;');
		else{
			$query = Database::prepare('SELECT books.idbook, books.img, books.name, avtors.name1, books.description, books.cost
			                            FROM books INNER JOIN avtors 
			                            ON avtors.id=books.id_avtors 
			                            WHERE books.id_avtors=:id
			                            ORDER BY books.idbook;');

			$query->bindValue(":id", $filter);//bind value - значение привязки

		}

		$query->execute();

		$books = $query->fetchAll();

		if(!count($books)){
			return null;
		}
		return $books;
	}

	public static function delete($idbook){
		$query = Database::prepare('DELETE FROM books WHERE books.idbook=:idbook');
		$query->bindValue(":idbook", $idbook);

		if(!$query->execute()){
			throw new PDOException("При добавлении записи возникла ошибка(books)");
			return false;
		}
		return true;
	}

	public static function getImage($idbook){
		$query = Database::prepare('SELECT books.img FROM books WHERE books.idbook=:idbook;');
		$query->bindValue(":idbook", $idbook);
		$query->execute();
		$books = $query->fetchAll();

		if(!count($books)){
			return null;
		}
		return $books;
	}

	public static function update(int $idbook, $img, string $name, int $avtor, string $description, int $cost){
		$query =  Database::prepare('UPDATE books SET img = :img, name = :name, id_avtors = :idavtors, description = :description, `cost` = :cost WHERE books.idbook=:idbook;');
		
		$query->bindValue(":img", $img);
		$query->bindValue(":name", $name);
		$query->bindValue(":idavtors", $avtor);
		$query->bindValue(":description", $description);
		$query->bindValue(":cost", $cost);
		$query->bindValue(":idbook", $idbook);

		if(!$query->execute()){
			throw new PDOException("При добавлении записи возникла ошибка(books");
			return false;
		}
		return true;
	}

	public static function getById($idbook){
		$query = Database::prepare('SELECT * FROM books WHERE books.idbook=:idbook;');
		$query->bindValue(":idbook", $idbook);
		$query->execute();
		$books = $query->fetchAll();

		if(!count($books)){
			return null;
		}
		return $books;
	}

	public static function insert($img, string $name, int $avtor, string $description, int $cost){
		$query =  Database::prepare('INSERT INTO books (img, name, id_avtors, description, cost) VALUES (:img, :name, :idavtors, :description, :cost);');
		$query->bindValue(":img", $img);
		$query->bindValue(":name", $name);
		$query->bindValue(":idavtors", $avtor);
		$query->bindValue(":description", $description);
		$query->bindValue(":cost", $cost);

		if(!$query->execute()){
			throw new PDOException("При добавлении записи возникла ошибка(books)");
			return false;
		}
		return true;
	}
}
