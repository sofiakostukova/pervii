<?php
require_once 'db_connect.php';

$salt = "izdfhbj[irgum4ert82j49-*//***n";
$Email = $_POST['Email'];
$Email = htmlspecialchars($Email);
$Password = $_POST['Password'];
$Password = htmlspecialchars($Password);
$Password = md5($salt . $Password);

$passerr = "";
$usererr = "";
$passerror = 0;

if(isset($_POST['loginin'])){
    $time = time();
    $stmt = $connection->prepare("SELECT * FROM `users` WHERE Email LIKE '%${Email}%'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result>0){
        if($result['Password'] != $Password && $Password != md5($salt)){
            $passerr = "Неверный пароль";
            $_SESSION['errors']++;
        }

        if($Password == md5($salt)){
            $passerr = "Введите пароль";
        }

        if ($result['Password']==$Password && $result['Email']==$Email){
            header('location: ../index.php');
            $_SESSION['check'] = 1;
            $_SESSION['Email'] = $Email;
        }
    }
    else{
        $usererr = 'Пользователь не зарегистрирован';
    }

    if($_SESSION['reg'] == 1){
        $_SESSION['errors']= 0;
        $_SESSION['reg'] =0;
    }

    if($_SESSION['errors']>=3){
        $_SESSION['time'] = $time + 3600;
        $passerror = 1;
        $usererr = 'Большое количество попыток входа, попробуйте войти через час';
    }

    if($_SESSION['time'] == time() && $passerror==1){
        $_SESSION['errors'] = 0;
        $passerror = 0;
    }
}

if(isset($_POST['exit'])){
    session_destroy();
    header('location: ../avtorizacia.php');
}