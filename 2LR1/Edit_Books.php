<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/header.php');

require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/logic.php');

require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActionsBooks.php');

$fields = booksActions::fillEdit($_GET['data-id-item']);
//var_dump($fields);
$message = booksActions::getMessage();
//создать в гете все поля пустые
?>



<div class="container text-center" style = "margin-top:35px;margin-bottom:35px">
    
	<h1>Редактировать</h1>
    
                <form action = "" method = "post" class = "form col" enctype="multipart/form-data">
                    
                <p style = "color:red"><?php 
                                      if(isset($message) && strlen($message) > 0)
                                      {  
                                          echo $message; $message = "";} ?>
                    
                <input type="hidden" name="idbook" value="<?=$_GET['data-id-item']?>" />

                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />

                <input type="file" class="form-control" name ="img" title="Изображение">

                <input type="text" name="name" placeholder = "Название" class = "form-control" required value="<?=isset($fields['name']) ? htmlspecialchars($fields['name']) : '' ?>">

                    <select name = "avtor" class = "form-control">

                        <option value="<?=$fields['id_avtors']?>" <?php if(!isset($_POST['avtor'])) echo "selected"?>>

                        <?php
                        $name1 = avtors::getById($fields['id_avtors']);
                        print($name1[0]['name1']);
                         ?>

                        </option>

                     <?php
                     if(gettype($NameAvtors) == 'array')
                            foreach($NameAvtors as $item): ?>

                                <option value="<?php echo $item['id']?>"<?php if(isset($_POST['avtor']) && $item['id'] == $_POST['avtor']) echo "selected"?>> <?php echo $item['name1'] ?></option>';

                            <?php endforeach ?>
                </select>

                <input type="text" name="description" placeholder = "Описание" class = "form-control" required value="<?=isset($fields['description']) ? htmlspecialchars($fields['description']) : '' ?>">

                    <input type="number" name="cost" placeholder = "Стоимость" class = "form-control" required value="<?=isset($fields['cost']) ? htmlspecialchars($fields['cost']) : '' ?>">

                <button class = "btn btn-success" type = "submit">Редактировать</button>
                    
              </form>
        </div>



<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/footer.php'); ?>