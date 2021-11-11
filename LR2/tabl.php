<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "chitai_gorod");

$avtorsArray = array("Демидович Б.", "Асиман А.", "Шрейер Д.", "Ивченко Т.", "Шилдт Г.", "Сапольски Р.");

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysql->connect_errno) exit("ошибка подключения к БД");
$mysql->set_charset('utf8');
$query = "SELECT books.img, books.name, avtors.name1, books.description, books.cost FROM `books` INNER JOIN avtors ON books.id_avtors=avtors.id";


    if ((isset($_GET["name"])) || (isset($_GET["avtors"])) || (isset($_GET["min"])) || (isset($_GET["max"]))) {
    $check = false;

        if ($_GET["name"] != "") 
        {
            $query .= " WHERE name LIKE '%" . mysqli_real_escape_string($mysql,$_GET["name"]) . "%'";
        }

        if ($_GET["description"] != "") 
        {
            $query .= " WHERE description LIKE '%" . mysqli_real_escape_string($mysql,$_GET["description"]) . "%'";
        }

        if ($_GET["avtors"] != "0")
        {
                $query .= " AND books.id_avtors = '" . mysqli_real_escape_string($mysql,$_GET["avtors"]) . "'";
        }

        if ($_GET["min"] != "") {
                    $query .= " AND books.cost >= " . intval($_GET["min"]);
            }
        

        if ($_GET["max"] != "") {
                    $query .= " AND books.cost <= " . intval($_GET["max"]);
            } 

   }

var_dump($query);

$result = $mysql->query($query);
$i = 0;
while ($row = $result->fetch_assoc()) {
        $i++;
        echo "<tr><th scope='row'><img src='" . $row["img"] . "' style='width: 200px'></th>
             <td>" . $row['name'] . "</td>
             <td>" . $row["name1"] . "</td>
             <td>" . $row['description'] . "</td>
             <td>" . $row['cost'] . " руб.</td>
             </tr>";
    }

    if ($i == 0) {
        echo "Ничего не найденно(((";
    }
