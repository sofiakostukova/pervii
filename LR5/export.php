<?php
require_once 'logic_all/log_export.php';

?>

<?php include('header.php');?>

<div class = "d-flex container-xxl justify-content-center p-4 ">

<form action="" enctype="multipart/form-data" method="post" class = "form form border rounded d-flex flex-column justify-content-center">

    <h5 class="p-3 d-flex justify-content-center">Произвести экспортирование из таблицы books нашей БД</h5>

    <div class="p-5">
        <input type="submit" class = "buttons" name = "export" VALUE="Экспортировать">
    </div>

    <?php if($exportDB) {
        echo '<div class = "p-4 d-flex flex-column">
                   <h5>books_exported передан скрипту worker.php по протоколу HTTP методом POST. '.$response.'.</h5>
              </div>';
    }

    else if($errors){
        echo $errors;
    }
    ?>

</form>

</div>

<?php include('footer.php');?>
