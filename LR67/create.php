<?php
require_once 'logic_all/logictable.php';

$row = $obj->getplaces();

if(!$row){ die('В базе данных отсутствуют места захоронения'); }

?>

<?php include('header.php');?>

<div class = "d-flex container-xxl justify-content-center p-4 ">
    <form enctype="multipart/form-data" action="" method = "post" class="form">


        <label class = "labels">Изображение</label>

        <input type="file" name = "img_books">

        <?php if($arrayerrors['errimg']){
            echo ' <div class = "err">'.$arrayerrors['errimg']. '</div>';}
        ?>


        <label class = "labels">Название</label>

        <input class = "forminputs" name = "name_of_books" type = "text" placeholder="Введите название книги" value="<?php echo $books['name_of_books']?>">

        <?php if($arrayerrors['errbooks']){
            echo ' <div class = "err">'.$arrayerrors['errbooks'] . '</div>';}
        ?>


        <label class = "p-4 text-center">Автор</label>

            <select name="name_of_avtors" class="form-control">

                <option value="<?php echo $books['name_of_avtors']?>" selected>
                    <?php if($books['name_of_avtors']){
                        echo $row[$books['name_of_avtors']-1]['name1'];
                    }
                    else{ echo 'Выберите автора';}?>
                </option>

                <?php foreach($row as $avtors){
                    if($books['name_of_avtors']){
                        if($avtors["id"]!=$row[$books['name_of_avtors']-1]['id']){
                            echo '<option value = "'.$avtors["id"].'">'.$avtors["name1"].'</option>';
                        }
                    }
                    else{
                        echo '<option value = "'.$avtors["id"].'">'.$avtors["name1"].'</option>';
                    }
                }?>
            </select>

        <?php if($arrayerrors['erravtors']){
            echo ' <div class = "err">'.$arrayerrors['erravtors']. '</div>';}
        ?>


        <label class = "labels">Описание</label>

        <input class = "forminputs" name = "annotation" type="text" value="<?php echo $books['annotation']?>">

        <?php if($arrayerrors['errannotation']){
            echo ' <div class = "err">'.$arrayerrors['errannotation']. '</div>';}
        ?>


        <label class = "labels">Цена</label>

        <input type="number" name = "price" step="1" min="0" value="<?php echo $books['price']?>">

        <?php if($arrayerrors['errprice']){
            echo ' <div class = "err">'.$arrayerrors['errprice']. '</div>';}
        ?>

        <div class = "d-flex flex-row p-2">
            <a href="table.php" class="m-5">Все книги</a>

        <button type="submit" name="creating" class = "buttons m-5" >Добавить книгу</button>

        </div>
    </form>
</div>
<?php include('footer.php');?>
