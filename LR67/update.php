<?php
require_once 'logic_all/logictable.php';

$idbooks = htmlspecialchars($_GET['id']);
//echo  $_GET['id'];
$data = $obj->getById($idbooks);
echo $obj->getById($idbooks);
print_r($obj->getById($idbooks));
if(!$data){ die("У пользователя некорректный id"); }

$row = $obj->getavtors();

if(!$row){ die('В базе данных отсутствуют места захоронения'); }
?>

<?php include('header.php');?>

    <div class = "d-flex container-xxl justify-content-center p-4 ">
        <form enctype="multipart/form-data" action="" method = "post" class="form">

            <input type="hidden" name="idbooks" value="<?php echo $data[0][0] ?>">

            <input type="hidden" name="imgname" value="<?php echo $data[0][1] ?>">


            <label class = "labels">Изображение</label>

            <input type="file" name = "img_books" >

            <?php if($arrayerrors['errimg']){
                echo ' <div class = "err">'.$arrayerrors['errimg']. '</div>';}
            ?>


            <label class = "labels">Название</label>

            <input class = "forminputs" name = "name_of_books" type = "text" placeholder="Введите название" value="
                <?php if(!$books['name_of_books']){
                echo $data[0][2];}
                else{echo $books['name_of_books'];} ?>">

            <?php if($arrayerrors['errbooks']){
                echo ' <div class = "err">'.$arrayerrors['errbooks'] . '</div>';}
            ?>


            <label class = "p-4 text-center">Автор</label>

            <select name="name_of_avtors" class="form-control">

                <option value="<?php if(!$books['name_of_avtors']){
                    echo $data[0][6];}
                    else{echo $books['name_of_avtors'];}?>" selected>
                    <?php if($books['name_of_avtors']){
                        echo $row[$books['name_of_avtors']-1]['name1'];}
                        else{
                            echo $data[0][5];} ?>
                </option>

                <?php foreach($row as $avtors){
                if(!$books['name_of_avtors']){
                    if($avtors['id']!=$data[0][6]){
                   echo '<option value = "'.$avtors['id'].'">'. $avtors['name1'].'</option>';}}
                else {
                    if ($avtors['id'] != $row[$books['name_of_avtors'] - 1]['id']) {
                        echo '<option value = "' . $avtors['id'] . '">' . $avtors['name1'] . '</option>';
                    }
                }}
                ?>

            </select>

            <?php if($arrayerrors['errbooks']){
                echo ' <div class = "err">'.$arrayerrors['errbooks']. '</div>';}
            ?>


            <label class = "labels">Описание</label>

            <input class = "forminputs" name = "annotation" type="text" value="<?php if(!$books['annotation']){
                echo $data[0][3];}
                else{
                    echo $books['annotation'];}?>">

            <?php if($arrayerrors['errannotation']){
                echo ' <div class = "err">'.$arrayerrors['errannotation']. '</div>';}
            ?>


            <label class = "labels">Цена</label>

            <input type="number" name = "price" step="1" min="0" value="<?php  if(!$books['price']){
                echo $data[0][4];}
                else{
                    echo $books['price'];}?>">

            <?php if($arrayerrors['errprice']){
                echo ' <div class = "err">'.$arrayerrors['errprice']. '</div>';}
            ?>

            <div class = "d-flex flex-row p-2">
                <a href="table.php" class="m-5">Все книги</a>

                <button type="submit" name="editing" class = "buttons m-5" >Обновить книгу</button>
            </div>
        </form>
    </div>

<?php include('footer.php');?>