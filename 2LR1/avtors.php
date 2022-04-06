<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/HeaderFooter/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/logic/ClassActions.php');


$result = avtorsActions::viewAll();
$message = avtorsActions::getMessage();

?>

<div class="container text-center" style = "margin-top:35px;">
	<h1 style = "margin-bottom:35px;">Авторы</h1>
            <?php 
                if(strlen($message) > 0):
                    
                    echo "<div style = 'padding: 0 5px;margin: auto; width:400px; height:100px;background:rgba(255, 0, 0, 0.4);'><h2 style = 'line-height: 100px;'>".$message."</h2></div>";
                
                    else:?>
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope = "col">ID</th>
                                    <th scope = "col">Автор</th>
                                    <th scope = "col">Редактирование</th>
                                    <th scope = "col">Удаление</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php if(!empty($result))
                                foreach($result as $row):?>
                                
                                    <tr>
                                        
                                        <td><?=intval($row['id'])?></td>
                                        
                                        <td><a href="books.php?preset=<?=intval($row['id'])?>"target = "blank"><?=htmlspecialchars($row['name1'])?></a></td>
                                        
                                        <td><a class="btn btn-outline-info"id="<?=$row['id']?>" href = "Edit_Avtors.php?data-id-item=<?=$row['id']?>">Редактировать</a></td>
                                        
                                        <td><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                             <a class="btn btn-outline-danger delete"id="<?=$row['id']?>" href = "logic/ClassActions.php?data-id-item=<?=-$row['id']?>">Удалить</a></td>
                                    
                                    </tr>
                                
                                <?php endforeach;?>            
                            </tbody>
                        </table>
                    
                    <?php endif; ?>
             <a class = "btn btn-lg btn-info" type="button" href="Create_Avtors.php">Добавить</a>
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