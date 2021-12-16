<?php
require_once 'logic_all/logictable.php';

$id_books = htmlspecialchars($_GET['id']);
$data = $obj->getById($id_books);

if(!$data){ die("У пользователя некорректный id"); }
?>

<?php include('header.php');?>

<div class = "d-flex container-xxl justify-content-center p-4 ">
<form action="" method = "post" class="form">

    <input type="hidden"  name="id_books" value="<?php echo $data[0][0]?>">

    <input type="hidden"  name="imgname" value="<?php echo $data[0][1]?>">

    <h3>Вы уверены, что хотите удалить <?php echo $data[0][2] ?>?</h3>

    <div class = "d-flex flex-row p-2">
    <a href="table.php" class="m-5">Все книги</a>

    <button type="submit" name="deleting" class = "buttons m-5" >Удалить книгу</button>
    </div>
</form>
</div>
<?php include('footer.php');?>