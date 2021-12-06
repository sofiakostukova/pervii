<?php
error_reporting(E_ERROR | E_PARSE);

require_once 'logic_all/sign_in.php';
?>

<?php include('header.php');?>

<div class = "d-flex container-xxl justify-content-center">
    <form class="form" action="" method ="post">
        <label class = "labels">Ваш логин(email)</label>
        <input name = "Email" class = "forminputs" type="email" value = "<?php echo $Email?>">
        <?php
        if($passerror ==0){
            echo '<label class = "labels">Ваш пароль</label>
                  <input name = "Password" class = "forminputs" type = "Password" >';
        }

        if($passerr && $passerror==0){
            echo ' <div class = "err">'.$passerr . '</div>';}
        ?>

        <button name = "loginin" type = "submit" class = "buttons" >Войти</button>

        <div>
            Если у вас не создан аккаунт - <a href="registracia.php">зарегистрируйтесь!</a>
        </div>

        <?php if($usererr){
            echo ' <div class = "err">'.$usererr.'</div>';}
        ?>
    </form>
</div>

<?php include('footer.php');?>


