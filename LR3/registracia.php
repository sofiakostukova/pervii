<?php
require_once 'logic_all/sign_up.php';
?>

<body>
<?php include('header.php');?>
<div class = "d-flex container-xxl justify-content-center p-4 ">
    <form action="" method = "post" class="form">

        <label class = "labels">Ваше ФИО</label>
        <input class = "forminputs" name = "Full_name" type = "text" placeholder="Введите ФИО" value="<?php echo $Full_name?>">
        <?php if($arrayerrors['errfio']){
            echo ' <div class = "err">'.$arrayerrors['errfio'] . '</div>';}
        ?>

        <label class = "labels">Дата рождения</label>
        <input class = "forminputs" name = "Date_of_birth" type = "date" placeholder="Введите дату рождения" value="<?php echo $Date_of_birth?>">
        <?php if($arrayerrors['errdate']){
            echo ' <div class = "err">'.$arrayerrors['errdate'] . '</div>';}
        ?>

        <label class = "labels">Адрес</label>
        <input class = "forminputs" name = "Address" type = "text" placeholder="Введите адрес" value="<?php echo $Address?>">
        <?php if($arrayerrors['erradd']){
            echo ' <div class = "err">'.$arrayerrors['erradd'] . '</div>';}
        ?>

        <label class = "labels">Пол</label>
        <input class = "forminputs" name = "gender" type = "text" placeholder="Введите пол" value="<?php echo $gender?>">
        <?php if($arrayerrors['errgender']){
            echo ' <div class = "err">'.$arrayerrors['errgender'] . '</div>';}
        ?>

        <label class = "labels">Интересы</label>
        <input class = "forminputs" name = "Interests" type = "text" placeholder="Введите интересы" value="<?php echo $Interests?>">
        <?php if($arrayerrors['errinterests']){
            echo ' <div class = "err">'.$arrayerrors['errinterests'] . '</div>';}
        ?>

        <label class = "labels">Ссылка на профиль в ВК</label>
        <input class = "forminputs" name = "Link_to_VK_profile" type = "text" placeholder="Введите ссылку" value="<?php echo $Link_to_VK_profile?>">
        <?php if($arrayerrors['errlink']){
            echo ' <div class = "err">'.$arrayerrors['errlink'] . '</div>';}
        ?>

        <label class = "labels">Группа крови</label>
        <input class = "forminputs" name = "blood_type" type="number" placeholder="" step="1" min="1" max="4" value="<?php echo $blood_type ?>">
        <?php if($arrayerrors['errblood']){
            echo ' <div class = "err">'.$arrayerrors['errblood'] . '</div>';}
        ?>

        <label class = "labels">Резус фактор</label>
        <input class = "forminputs" name = "Rh_factor" type = "text" placeholder="Введите резус фактор" value="<?php echo $rh_factor ?>">
        <?php if($arrayerrors['errRh']){
        echo ' <div class = "err">'.$arrayerrors['errRh'].'</div>';}
        ?>

        <label class = "labels">Ваш логин(email)</label>
        <input class = "forminputs" name = "Email" type="Email" placeholder="Введите логин" value="<?php echo $Email?>">
        <?php if($arrayerrors['erremail']){
            echo ' <div class = "err">'.$arrayerrors['erremail'] . '</div>';}
        ?>

        <label class = "labels">Придумайте пароль</label>
        <input class = "forminputs"  name = "Password" type = "Password" placeholder="Введите пароль(A-Z, a-z, 1-9, >6, -, ' ', _)" value="<?php echo $Password?>">
        <?php if($arrayerrors['errpassword']){
            echo ' <div class = "err">'.$arrayerrors['errpassword'] . '</div>';}
        ?>

        <label class = "labels">Подтвердите пароль</label>
        <input class = "forminputs" name = "Confirm_the_password" type = "password" placeholder="Введите пароль ещё раз" value="<?php echo $Confirm_the_password?>">
        <?php if($arrayerrors['errpassword']){
            echo ' <div class = "err">'.$arrayerrors['errpassword'] . '</div>';}
        ?>

        <button type="submit" name="register" class = "buttons" >Зарегистрироваться</button>

        <div>
            Если у вас уже есть аккаунт - <a href="avtorizacia.php">войдите!</a>
        </div>

    </form>
</div>
<?php include('footer.php');?>




