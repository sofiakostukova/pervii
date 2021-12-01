<?php
require_once 'db_connect.php';

$query = "select books.img, books.name, books.description, books.cost, avtors.name1
          FROM books 
          INNER JOIN avtors ON books.id_avtors=avtors.id";

$binds = [];
$nameofavtors= (int)$_GET['nameofavtors'];
$nameofavtors = htmlspecialchars($nameofavtors);
$nameofbooks = $_GET['nameofbooks'];
$nameofbooks = htmlspecialchars($nameofbooks);
$bookcost = (int)$_GET['bookcost'];
$bookcost = htmlspecialchars($bookcost);
$flag = false;

if(!key_exists('clearfilter', $_GET)){
    if (count($_GET)>0 && ($nameofbooks !=""||$nameofavtors!=0||$bookcost!=0)) {
        $query .= " WHERE ";
        if ($nameofavtors) {
            $query .= "books.id_avtors = :nameofavtors";
            $binds['nameofavtors'] = $nameofavtors;
            $flag = true;
        }
        if ($nameofbooks) {
            if ($flag) {
                bindss($nameofbooks, " AND books.name LIKE %:nameofbooks%", 'nameofbooks');
                $query .= " AND books.name LIKE %:nameofbooks%";
                $binds['nameofbooks'] = $nameofbooks;
            } else {
                bindss($nameofbooks, "books.name LIKE %:nameofbooks%", 'nameofbooks');
                $query .= "books.name LIKE %:nameofbooks%";
                $binds['nameofbooks'] = $nameofbooks;
                $flag = true;
            }
        }
        if ($bookcost) {
            if ($flag) {
                $query .= " AND books.cost = :bookcost";
                $binds['bookcost'] = $bookcost;
            } else {
                $query .= "books.cost = :bookcost";
                $binds['bookcost'] = $bookcost;
                $flag = true;
            }

        }
    }

}

var_dump($query);


$sql = "select * from avtors";
$avtors = $connection->prepare($sql);
$avtors->execute();
$row = $avtors->fetchALL(PDO::FETCH_ASSOC);
$books = $connection->prepare($query);
$books->execute($binds);


