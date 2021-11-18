<?php
include('tabl.php');
//$query = "SELECT books.img, books.name, avtors.name1, books.description, books.cost FROM `books` INNER JOIN avtors ON books.id_avtors=avtors.id";
$result = $mysql->query($query);
//$result = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);
$avtorsFor = getTableFdb();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>books</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

<?php  include ('header.php'); ?>

<form class="container pt-3 pb-3" action="osnovan.php" method="GET" name="fillter">

    <div class="price d-flex align-items-center justify-content-center">

        <input style='width: 400px;' class="form-control" name="name" type="text" placeholder="Название" value="<?=htmlspecialchars($_GET["name"])?>">

        <select class="form-control" style='width: 200px; margin-left: 30px' name="avtors" aria-label="Default select example">
            <option value="0" selected >Автор:</option>
            <?php foreach ($avtorsFor as $opt):?>
            <?$selected = htmlspecialchars($_GET["avtors"]) == $opt['id']?>
                <option <?=($selected ? ' selected ' : '')?> value="<?=$opt['id']?>"><?=$opt['name1']?></option>
            <?php endforeach;?>

        </select>

        <input style='width: 400px; margin-left: 30px' class="form-control" name="description" type="text" placeholder="Описание" value="<?=htmlspecialchars($_GET["description"])?>">

        <span style="padding-right: 8px;  margin-left: 30px">Цена от: </span>

        <input style='width: 100px' class="form-control" type="number" name="min" value="<?=htmlspecialchars($_GET["min"])?>">

        <span style="padding: 0 10px;"> до </span>

        <input style='width: 100px' class="form-control " type="number" name="max" value="<?=htmlspecialchars($_GET["max"])?>">


        <button type="submit" class="btn btn-primary"  style='margin-left: 30px; color: white; background-color: #29abe1; border: none;'>Применить</button>
        <a class="btn btn-warning" href="/osnovan.php" style='margin-left: 30px; color: white; background-color: #29abe1; border: none;'>Отчистить</a>
    </div>
</form>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Изображение</th>
            <th scope="col">Название</th>
            <th scope="col">Автор</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>

        <tbody>
        <?foreach($result as $row):?>
            <tr>
                <th scope='row'>
                    <img src='<?=$row["img"]?>' width='200' alt=''>
                </th>
                <th scope='row'>
                    <?=$row['name'] ?>
                </th>
                <th scope='row'>
                    <?=$row['name1'] ?>
                </th>
                <th scope='row'>
                    <?=$row['description'] ?>
                </th>
                <th scope='row'>
                    <?=$row['cost'] ?>
                </th>

            </tr>

        <?endforeach;?>
        </tbody>
    </table>
</div>


<?php  include ('footer.php'); ?>

</body>

</html>