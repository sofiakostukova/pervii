<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActions.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/header.php');

$message = avtorsActions::getMessage();

?>

<div class="container text-center" style = "margin-top:35px;">

	<h1>Добавить автора</h1>

        		<form action = "" method = "post" class = "form col"enctype="multipart/form-data">

		        <p style="color: red"><?php
                                           if(isset($message) && strlen($message) > 0)
                                           {
                                               echo $message; $message = "";}?></p>

		        <input type="text" name="name1" placeholder = "Автор" class = "form-control" required value="<?=isset($_POST['name1']) ? htmlspecialchars($_POST['name1']) : '' ?>">

		        <button class = "btn btn-success" type = "submit">Добавить</button>
		      </form>

        </div>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/footer.php'); ?>
