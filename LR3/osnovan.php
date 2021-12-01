<?php
require_once 'logic_all/logic.php';
require_once 'logic_all/sign_in.php';

if($_SESSION['check'] !=1){
    header('location: avtorizacia.php' );
}
//$result = $mysql->query($query);
//$avtorsFor = getTableFdb();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>

<body>

<?php  include ('header.php'); ?>

<form class="container pt-3 pb-3" action="osnovan.php" method="GET" name="fillter">

    <div class="price d-flex align-items-center justify-content-center">

        <input style='width: 400px;' class="form-control" name="name" type="text" placeholder="Название" value="<?=htmlspecialchars($_GET["name"])?>">

        <select class="form-control" style='width: 200px; margin-left: 30px' name="avtors" aria-label="Default select example">
            <option value="0" selected >Автор:</option>
            <?php foreach($row as $avtor):?>

                <option value = "<?=$avtor['id'] ?>"> <?=$avtor['name1'] ?></option>;;
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
        <?php foreach($books as $row):?>

            <tr>
                <th scope="row"><img src="logic_all/img_protect.php?img=<?php echo $row[0]?>" class = "imgcheck"></th>

                <td><?=$row[1]?></td>
                <td><?=$row[4]?></td>
                <th><?=$row[2]?></th>
                <td><?=$row[3]?></td>

            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>
</div>


<?php  include ('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>