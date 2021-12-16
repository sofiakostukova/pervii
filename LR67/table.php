<?php
require_once 'logic_all/logictable.php';
?>

<?php include('header.php');?>

    <div class = "container"><div class = "row"><div class = "col-12">
                <a class="btn btn-primary d-flex justify-content-center m-4" type="button"  href="create.php"><i class = "fa fa-plus m-2"></i>Добавить книгу</a></div>

            <table class = "table table-striped table-hover m-2">

                <thead class = "thead-light">
                <th>ID</th>
                <th>Изображение</th>
                <th>Название</th>
                <th>Автор</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Выбор действия</th>
                </thead>

                <tbody>
                <?php
                $result = $obj->showData();
                if (!$result){die("Данных нет в таблице БД");}
                foreach($result as $row):?>
                    <tr>
                    <tr>
                        <td><?=$row[0]?></td>
                        <th scope="row"><img src="<?php echo $row[1]?>" class = "imgcheck" width='200'></th>
                        <td><?=$row[2]?></td>
                        <th><?=$row[5]?></th>
                        <td><?=$row[3]?></td>
                        <td><?=$row[4]?></td>

                        <td><a href="update.php?id=<?=$row[0]?>" class = "btn btn-success"><i class = "fa fa-edit">обновить</i></a>
                            <a href="delete.php?id=<?=$row[0]?>" class = "btn btn-danger"><i class = "fa fa-trash-alt">удалить</i></a>

                    </tr>
                <?php endforeach;?>
                </tbody>

            </table>

        </div>
    </div>
    </div>

<?php include('footer.php');?>