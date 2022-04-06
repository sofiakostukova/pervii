<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActions.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/header.php');

$fields = avtorsActions::fillEdit($_GET['data-id-item']);
$message = avtorsActions::getMessage();

?>


<div class="container text-center" style = "margin-top:35px;margin-bottom:35px">

	<h1>Редактировать</h1>

                <form action = "" method = "post" class = "form col"enctype="multipart/form-data">

                <p style = "color:red"><?php
                                            if(isset($message) && strlen($message) > 0)
                                            {
                                                echo $message; $message = "";}?></p>

                <input type="hidden" name="id" value="<?=$_GET['data-id-item']?>" />

                <input type="text" name="name1" placeholder = "Автор" class = "form-control" required value="<?=isset($fields['name1']) ? htmlspecialchars($fields['name1']) : '' ?>">
                
                <button class = "btn btn-success" type = "submit">Редактировать</button>
              </form>
        </div>



<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/footer.php'); ?>