<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActions.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/header.php');


$message = booksActions::getMessage();

?>

<div class="container text-center" style = "margin-top:35px;">

	<h1>Добавить книгу</h1>

        		<form action = "" method = "post" class = "form col"enctype="multipart/form-data">

		        <p style="color: red"><?php
                                           if(isset($message) && strlen($message) > 0)
                                           {
                                               echo $message; $message = "";}?></p>

                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />

                    <input type="file" class="form-control" name ="img" title="Изображение" required>

		            <input type="text" name="name" placeholder = "Название" class = "form-control" required value="<?=isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">

                    <input type="text" name="description" placeholder = "Описание" class = "form-control" required value="<?=isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '' ?>">

                    <input type="number" name="cost" placeholder = "Стоимость" class = "form-control" required value="<?=isset($_POST['cost']) ? htmlspecialchars($_POST['cost']) : '' ?>">


                    <select name = "avtor" class = "form-control">

                        <option value="0" <?php if(!isset($_POST['avtor'])) echo "selected"?>>Автор:</option>

                        <?php
                        if(gettype($NameAvtors) == 'array')
                            foreach($NameAvtors as $item): ?>

                                <option value="<?php echo $item['id']?>"<?php if(isset($_POST['avtor']) && $item['id'] == $_POST['avtor']) echo "selected"?>> <?php echo $item['name1'] ?></option>';
                            <?php endforeach ?>
                        
                    </select>

                   

		        <button class = "btn btn-success" type = "submit">Добавить</button>
		      </form>
        </div>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/footer.php'); ?>
