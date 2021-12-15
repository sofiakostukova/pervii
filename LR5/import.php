<?php
require_once 'logic_all/log_import.php';
?>

<?php include('header.php');?>
<div class = "d-flex container-xxl justify-content-center p-4 ">
    <form enctype="multipart/form-data" action="" method="post" class = "form border rounded d-flex flex-column justify-content-center">
        <h5 class="p-3" >Импортируйте свои данные в БД через JSON формат</h5>
        <div class="p-5 d-flex flex-column justify-content-center">
            <div><input type = "file" class = "p-5 " name="file_json"></div>
            <div class="d-flex justify-content-center"><input type="submit" name="import" class = "buttons"></div>
        </div>
            <?php if($importDB){
                echo '<div class = "p-4 d-flex flex-column">
                          <h5>Файл с данными получен с вашего диска и обработан. Создана таблица books_imported, число записей в ней - '.$importDB.' </h5>
                      </div>';
            }
            if($errors){
                echo $errors;
            }
           ?>

    </form>
</div>

<?php include('footer.php');?>
