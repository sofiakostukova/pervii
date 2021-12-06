<?php
require_once 'db_connect.php';

$salt = "izdfhbj[irgum4ert82j49-*//***n";
$Full_name = $_POST['Full_name'];
$Full_name = htmlspecialchars($Full_name);
$Date_of_birth = $_POST['Date_of_birth'];
$Date_of_birth = htmlspecialchars($Date_of_birth);
$Address = $_POST['Address'];
$Address = htmlspecialchars($Address);
$gender = $_POST['gender'];
$gender = htmlspecialchars($gender);
$Interests = $_POST['Interests'];
$Interests = htmlspecialchars($Interests);
$Link_to_VK_profile = $_POST['Link_to_VK_profile'];
$Link_to_VK_profile = htmlspecialchars($Link_to_VK_profile);
$blood_type = (int)$_POST['blood_type'];
$Rh_factor = $_POST['Rh_factor'];
$Rh_factor = htmlspecialchars($Rh_factor);
$Email = $_POST['Email'];
$Email = htmlspecialchars($Email);
$Password = $_POST['Password'];
$Password = htmlspecialchars($Password);
$Confirm_the_password = $_POST['Confirm_the_password'];
$Confirm_the_password = htmlspecialchars($Confirm_the_password);


$arrayerrors = [
    "errfio" => "",
    "errdate" => "",
    "erradd" => "",
    "errgender" => "",
    "errinterests" => "",
    "errlink" => "",
    "errblood" => "",
    "errRh" => "",
    "erremail" => "",
    "errpassword" => "",
];

$checkedemail = "";

if(isset($_POST['register'])){

        $users = $connection->prepare("SELECT * FROM users WHERE Email=:Email");
        $users->execute(['Email' => $Email,]);

        $usern = $users->fetchColumn();
        $errors = 0;

        if($Full_name == ""){
            $arrayerrors['errfio'] = 'Заполните ФИО';
            $errors++;
            echo $Full_name;
        }

        if($Date_of_birth == ""){
            $arrayerrors['errdate'] = 'Заполните дату рождения';
            $errors++;
            echo $Date_of_birth;
        }

        if($Address == ""){
            $arrayerrors['erradd'] = 'Заполните адресс';
            $errors++;
            echo $Address;
        }

        if($gender == ""){
            $arrayerrors['errgender'] = 'Заполните пол';
            $errors++;
            echo $gender;
        }

        if($Interests == ""){
            $arrayerrors['errinterests'] = 'Заполните интересы';
            $errors++;
            echo $Interests;
        }

        if($Link_to_VK_profile == ""){
            $arrayerrors['errLink_to_VK_profile'] = 'Заполните ссылку на профиль ВК';
            $errors++;
            echo $Link_to_VK_profile;
        }
        if($blood_type == ""){
            $arrayerrors['errblood'] = 'Заполните группу крови';
            $errors++;
            echo $blood_type;
        }

        if(!$Rh_factor || (strcasecmp($Rh_factor, "+"))!=0&& (strcasecmp($Rh_factor, "-"))!=0){
            echo $Rh_factor;
            $arrayerrors['errRh'] = 'Не корректный резус-фактор';
            $errors++;
        }

        $checkedemail = filter_var($Email, FILTER_VALIDATE_EMAIL);

        if($usern>0){
            $arrayerrors['erremail'] = 'Эта почта уже была зарегистрирована';
            $errors++;
        }

        if(!$checkedemail || $Email === ""){
            $arrayerrors['erremail'] = 'Неправильная почта или заполните поле';
            $errors++;
            echo $checkedemail;
        }

        if($Password != $Confirm_the_password ){
            echo $Password ;
            echo $Confirm_the_password;
            $arrayerrors['errpassword'] = 'Пароли не совпадают';
            $errors++;
            }


        if(!preg_match('#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*\W)(?=.*\s)(?=.*[-])(?=.*[_])#s', $Password) || preg_match('#^(?=.*[А-Я])(?=.*[а-я])#s', $Password)  || strlen($Password)<6){
            $arrayerrors['errpassword'] = 'Слишком лёгкий пароль или содержит русские символы. Требования к паролю: длиннее 6 символов, обязательно содержит большие латинские буквы, маленькие латинские буквы, спецсимволы (знаки препинания, арифметические действия и тп), пробел, дефис, подчеркивание и цифры.';
            $errors++;
        }

        if($Password ==''&&$Confirm_the_password==''){
            $arrayerrors['errpassword'] = 'Заполните пароль';
            $errors++;
        }

        echo $errors;

        if($errors==0){
            $_SESSION['reg'] = 1;
            header('location: ../avtorizacia.php');
            $password = md5($salt . $Password);
            $users = $connection->prepare("INSERT INTO users (Full_name, Date_of_birth, Address, gender, Interests, Link_to_VK_profile, Blood_type, Rh_factor, Email, Password) VALUES (:Full_name, :Date_of_birth, :Address, :gender, :Interests, :Link_to_VK_profile, :Blood_type, :Rh_factor, :Email, :Password)");
            $users->execute([
                "Full_name" => $Full_name,
                "Date_of_birth" => $Date_of_birth,
                "Address" => $Address,
                "gender" => $gender,
                "Interests" => $Interests,
                "Link_to_VK_profile" => $Link_to_VK_profile,
                "Blood_type" => $blood_type,
                "Rh_factor" => $Rh_factor,
                "Email" => $checkedemail,
                "Password" => $password,
            ]);

           // var_dump($users);

        }

    }
