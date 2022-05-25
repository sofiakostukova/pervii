<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/header.php');

require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/logic.php');

require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActionsBooks.php');

if(isset($_GET['preset'])){
    $result = booksActions::viewAll($_GET['preset']);
}

else $result = booksActions::viewAll();

$message = booksActions::getMessage();


?>

<div class="container text-center" style = "margin-top:,35px;">

	<h1 style = "margin-bottom:40px;">Список книг:</h1>
            <?php

                if(isset($message) && strlen($message) > 0):
                    echo "<div style = 'padding: 0 5px;margin: auto; width:400px; height:100px;background:rgba(255, 0, 0, 0.4);'><h2 style = 'line-height: 90px;'>".$message."</h2></div>";

                else:?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope = "col">ID</th>
                                    <th scope = "col">Изображение</th>
                                    <th scope = "col">Название</th>
                                    <th scope = "col">Автор</th>
                                    <th scope = "col">Описание</th>
                                    <th scope = "col">Цена</th>
                                    <th scope = "col">Редактирование</th>
                                    <th scope = "col">Удаление</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if(!empty($result)){
                                    foreach($result as $row):

                                    ?>

                                    <tr>
                                        <td><?=htmlspecialchars($row['idbook'])?></td>

                                        <td><img src="/img/<?=htmlspecialchars($row['img'])?>"width = "250"></td>

                                        <td><?=htmlspecialchars($row['name'])?></td>

                                        <td><?=htmlspecialchars($row['name1'])?></td>

                                        <td><?=htmlspecialchars($row['description'])?></td>

                                        <td><?=htmlspecialchars($row['cost'])?></td>

                                        <td><a class="btn btn-outline-info"id="<?=$row['idbook']?>" href = "/Edit_Books.php?data-id-item=<?=$row['idbook']?>">Редактировать</a></td>

                                        <td>
                                            <a class="btn btn-outline-danger delete"id="<?=$row['idbook']?>" href = "logic/logic.php?data-id-item=<?=-$row['idbook']?>">Удалить</a>
                                        </td>

                                    </tr>
                                <?php endforeach;
                                }
                                ?>

                            </tbody>
                        </table>

                    <?php endif;
            ?>

             <a class = "btn btn-lg btn-info" type="button" href="<?php if(isset($_GET['preset'])) echo '#'; else echo 'Create_Books.php'?>" >Добавить</a>
        </div>
    </div>
<script>

    $(".delete").on("click", function() {
        if(!confirm($(this).html() + "?")) return false;
})
    
</script>


<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/footer.php');
?>