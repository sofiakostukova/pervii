<?php
require_once 'db_connect.php';

$query = "select books.img, books.name, books.description, books.cost, avtors.name1
          FROM books 
          INNER JOIN avtors ON books.id_avtors=avtors.id";

$binds = [];
$name1= (int)$_GET['name1'];
$name1 = htmlspecialchars($name1);
$name = $_GET['name'];
$name = htmlspecialchars($name);
/*$cost = (int)$_GET['cost'];
$cost = htmlspecialchars($cost);*/
$flag = false;

if(!key_exists('clearfilter', $_GET)){
    if (count($_GET)>0 && ($name !=""||$name1!=0/*||$cost!=0*/)) {
        $query .= " WHERE ";
        if ($name1) {
            $query .= "books.id_avtors = :name1";
            $binds['$name1'] = $name1;
            $flag = true;
        }
        if ($name) {
            if ($flag) {
                bindss($name, " AND books.name LIKE %:name%", 'name');
                $query .= " AND books.name LIKE %:name%";
                $binds['name'] = $name;
            } else {
                bindss($name, "books.name LIKE %:name%", 'name');
                $query .= "books.name LIKE %:name%";
                $binds['name'] = $name;
                $flag = true;
            }
        }
      /*  if ($cost) {
            if ($flag) {
                $query .= " AND books.cost = :cost";
                $binds['cost'] = $cost;
            } else {
                $query .= "books.cost = :cost";
                $binds['cost'] = $cost;
                $flag = true;
            }
            if ($_GET["min"] != "") {
                $query .= " AND books.cost >= " . intval($_GET["min"]);
            }

            if ($_GET["max"] != "") {
                $query .= " AND books.cost <= " . intval($_GET["max"]);
            }
        }*/
    }

}

/*
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

}*/

var_dump($query);


$sql = "select * from avtors";
$avtors = $connection->prepare($sql);
$avtors->execute();
$row = $avtors->fetchALL(PDO::FETCH_ASSOC);
$books = $connection->prepare($query);
$books->execute($binds);


