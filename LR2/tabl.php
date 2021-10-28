<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "chitai_gorod");

$brandArray = array("Демидович Б.", "Асиман А.", "Шрейер Д.", "Ивченко Т.", "Шилдт Г.", "Сапольски Р.");

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysql->connect_errno) exit("ошибка подключения к БД");
$mysql->set_charset('utf8');
$query = "SELECT books.id, books.img, books.name, avtors.avtors as avtors, books.description, books.cost FROM `books` INNER JOIN avtors ON books.id_avtors=avtors.id_avtors";

    if ((isset($_GET["name"])) || (isset($_GET["avtors"])) || (isset($_GET["min"])) || (isset($_GET["max"]))) {
    $check = false;

        if ($_GET["name"] != "") 
        {
            $query .= " WHERE name LIKE '%" . mysqli_real_escape_string($mysql,$_GET["name"]) . "%'";
            $check = true;
            echo "Название: " . $_GET["name"] . "<br>";
        }

        if ($_GET["avtors"] != "0") {
            if ($check) {
                $query .= " AND books.id_avtors = '" . mysqli_real_escape_string($mysql,$_GET["avtors"]) . "'";
            } 
            else {
                $query .= " WHERE books.id_avtors = '" . mysqli_real_escape_string($mysql,$_GET["avtors"]) . "'";
            }
            $check = true;
            echo "Автор: " . $avtorsArray[$_GET["avtors"] - 1] . "<br>";
        }

        if ($_GET["min"] != "") {
            if(filter_var($_GET["min"], FILTER_VALIDATE_INT)){
                if ($check) {
                    $query .= " AND books.cost > " . $_GET["min"];
                } 
                else {
                $query .= " WHERE books.cost > " . $_GET["min"];
                }
                $check = true;
                echo "Цена больше: " . $_GET["min"] . "<br>";
            }
            else{
                echo "Ошибка, введите число<br>";
            } 
        }

        if ($_GET["max"] != "") {
            if(filter_var($_GET["max"], FILTER_VALIDATE_INT)){
                if ($check) {
                    $query .= " AND books.cost < " . $_GET["max"];
                } 
                else {
                    $query .= " WHERE books.cost < " . $_GET["max"];
                }
                $check = true;
                echo "Цена меньше: " . $_GET["max"] . "<br>";
            }
            else{
                echo "Ошибка, введите число<br>";
            } 
        }
    }


                $result = mysql_query($query);
                

$i = 0;
    while ($myrow = mysql_fetch_array($result)) {
        $i++;
        echo "<tr><th scope='row'><img src='" . $myrow["img"] . "' style='width: 80px'></th>
             <td>" . $myrow['name'] . "</td>
             <td>" . $myrow["id_avtors"] . "</td>
             <td>" . $myrow['description'] . "</td>
             <td>" . $myrow['cost'] . " руб.</td>
             </tr>";
    }

    if ($i == 0) {
        echo "Ничего не найденно(((";
    }


