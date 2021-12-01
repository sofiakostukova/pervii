<?php
error_reporting(E_ERROR | E_PARSE);
require_once 'logic_all/sign_in.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel = "stylesheet" href = "main.css" type="text/css">
    <title>Web на практике. CSS, HTML, JavaScript, MySQL, PHP для fullstack-разработчиков</title>
</head>
<body class = "position-relative">
<div class="vhod">
    <div class="container d-flex align-items-center justify-content-between">
             <a href = "<?php if($_SESSION['check']){
                 echo 'filter.php';
             }
             else{
                 echo 'avtorizacia.php';
             }
             ?>"
                style="text-decoration: none;font-size: 15px"> НОВИНКИ </a>

            <div class="d-flex flex-row justify-content-end ">
                <?php

                if(!$_SESSION['check']){
                    echo "<div class = 'd-flex'>
                              <div class = 'text-center'>
                                  <div class='font-weight-bold'>ВЫ НЕ АВТОРИЗОВАНЫ</div>
                                      <a href='avtorizacia.php'>Войти</a>
                                  </div>
                                  <div>
                                      <a href='registracia.php'><br>Зарегистрироваться</a>
                                  </div>
                              </div> 
                          </div>";
                }
                else{
                    echo "<form method = 'post' class = 'd-flex'>
                              <div class = 'h-1 text-center' style='font-size: 15px'>Вы вошли как: ".$_SESSION['Email']."</div>
                              <div class = 'w-50 mx-auto'>
                                  <button name = 'exit' type = 'submit'class = 'btn btn-info buttons' style='color:black'>Выйти</button>
                              </div>
                          </form>";
                }

                ?>
            </div>



    </div>
</div>
    <?php include('header.php');?>

    <div class="vse">

        <!--списки-->

        <nav class="navbar navbar-expand-lg  ">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b style="font-size: 15px; color: black;">Книги</b></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">---Жанры---</a>

                            <a class="dropdown-item" href="#">Художественная литература</a>
                            <a class="dropdown-item" href="#">Книги для детей</a>
                            <a class="dropdown-item" href="#">Образование</a>
                            <a class="dropdown-item" href="#">Наука и техника</a>
                            <a class="dropdown-item" href="#">Общество</a>
                            <a class="dropdown-item" href="#">Деловая литература</a>
                            <a class="dropdown-item" href="#">Красота. Здоровье. Спорт</a>
                            <a class="dropdown-item" href="#">Увлечения</a>
                            <a class="dropdown-item" href="#">Психология</a>
                            <a class="dropdown-item" href="#">Эзотерика</a>
                            <a class="dropdown-item" href="#">Философия и религия</a>
                            <a class="dropdown-item" href="#">Искусство</a>
                            <a class="dropdown-item" href="#">Подарочные издания</a>
                            <a class="dropdown-item" href="#">Книги на иностранных языках</a>

                            <a class="dropdown-item" href="#">---Подборки---</a>

                            <a class="dropdown-item" href="#">Новинки литературы</a>
                            <a class="dropdown-item" href="#">Лучшие из лучших</a>
                            <a class="dropdown-item" href="#">10 книг о работе иммунитета</a>
                            <a class="dropdown-item" href="#">Скоро в продаже</a>
                            <a class="dropdown-item" href="#">Документы в красоте и порядке</a>

                            <a class="dropdown-item" href="#">---Издательства---</a>

                            <a class="dropdown-item" href="#">Эксмо</a>
                            <a class="dropdown-item" href="#">АСТ</a>
                            <a class="dropdown-item" href="#">Азбука</a>
                            <a class="dropdown-item" href="#">Альпина Паблишер</a>
                            <a class="dropdown-item" href="#">Росмэн</a>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b style="font-size: 15px; color: black;">Канцтовары</b></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Бумажные изделия</a>
                            <a class="dropdown-item" href="#">Галантерея</a>
                            <a class="dropdown-item" href="#">Прочие канцтовары</a>
                            <a class="dropdown-item" href="#">Упаковка</a>
                            <a class="dropdown-item" href="#">Товары для художников</a>
                            <a class="dropdown-item" href="#">Электротовары</a>
                            <a class="dropdown-item" href="#">Пеналы</a>
                            <a class="dropdown-item" href="#">Офисные принадлежности</a>
                            <a class="dropdown-item" href="#">Письменные принадлежности</a>
                            <a class="dropdown-item" href="#">Чертежные принадлежности</a>
                            <a class="dropdown-item" href="#">Школьные товары</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b style="font-size: 15px; color: black;">Сувениры</b></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Сувениры к празднику</a>
                            <a class="dropdown-item" href="#">Дом, Быт, Декор</a>
                            <a class="dropdown-item" href="#">Игры и Игрушки</a>
                            <a class="dropdown-item" href="#">Личные вещи</a>
                            <a class="dropdown-item" href="#">Мелочи сувенирные</a>
                            <a class="dropdown-item" href="#">Предсказания, пожелания, астрология, эзотерика</a>
                            <a class="dropdown-item" href="#">Сувенирные канцелярские и офисные принадлежности</a>
                            <a class="dropdown-item" href="#">Поздравительная атрибутика</a>
                            <a class="dropdown-item" href="#">Открытки и постеры</a>
                            <a class="dropdown-item" href="#">Календари</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b style="font-size: 15px; color: black;">Игры и игрушки</b></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Игры</a>
                            <a class="dropdown-item" href="#">Игрушки</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b style="font-size: 15px; color: black;">Творчество</b></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Наборы для детского творчества</a>
                            <a class="dropdown-item" href="#">Наборы для взрослого творчества</a>
                            <a class="dropdown-item" href="#">Заготовки</a>
                            <a class="dropdown-item" href="#">Инструменты и приспособления</a>
                            <a class="dropdown-item" href="#">Расходные материалы</a>
                            <a class="dropdown-item" href="#">Фурнитура для изготовления украшений</a>
                            <a class="dropdown-item" href="#">Декорирование</a>
                            <a class="dropdown-item" href="#">Бижутерия</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b style="font-size: 15px; color: black;">Распродажа</b></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Художественная литература</a>
                            <a class="dropdown-item" href="#">Книги для детей</a>
                            <a class="dropdown-item" href="#">Образование</a>
                            <a class="dropdown-item" href="#">Наука и техника</a>
                            <a class="dropdown-item" href="#">Общество</a>
                            <a class="dropdown-item" href="#">Деловая литература</a>
                            <a class="dropdown-item" href="#">Красота. Здоровье. Спорт</a>
                            <a class="dropdown-item" href="#">Увлечения</a>
                            <a class="dropdown-item" href="#">Психология</a>
                            <a class="dropdown-item" href="#">Эзотерика</a>
                            <a class="dropdown-item" href="#">Философия и религия</a>
                            <a class="dropdown-item" href="#">Искусство</a>
                            <a class="dropdown-item" href="#">Подарочные издания</a>
                            <a class="dropdown-item" href="#">Книги на иностранных языках</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Акции</b></p></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Что ещё почитать?</b></p></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Книжные циклы</b></p></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Из Instagram</b></p></a>
                    </li>

                </ul>
            </div>

        </nav>

        <!--темы-->

        <div class="shapka4">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><p class="fw-lighter text-decoration-underline"><b style="font-size: 14px; color: gray;">Книжный магазин</b></p></div>
                <div class="p-2 bd-highlight"><p class="fw-lighter"><b style="font-size: 14px; color: gray;">></b></p></div>
                <div class="p-2 bd-highlight"><p class="fw-lighter text-decoration-underline"><b style="font-size: 14px; color: gray;">Книги</b></p></div>
                <div class="p-2 bd-highlight"><p class="fw-lighter"><b style="font-size: 14px; color: gray;">></b></p></div>
                <div class="p-2 bd-highlight"><p class="fw-lighter text-decoration-underline"><b style="font-size: 14px; color: gray;">Наука и техника</b></p></div>
                <div class="p-2 bd-highlight"><p class="fw-lighter"><b style="font-size: 14px; color: gray;">></b></p></div>
                <div class="p-2 bd-highlight"><p class="fw-lighter text-decoration-underline"><b style="font-size: 14px; color: gray;">Технические науки</b></p></div>
                <div class="p-2 bd-highlight"><p class="fw-lighter"><b style="font-size: 14px; color: gray;">></b></p></div>
                <div class="p-2 bd-highlight"><p class="fw-lighter text-decoration-underline"><b style="font-size: 14px; color: gray;">Информатика. Компьютерная техника</b></p></div>
                <div class="p-2 bd-highlight"><p class="fw-lighter"><b style="font-size: 14px; color: gray;">></b></p></div>
                <div class="p-2 bd-highlight"><p class="fw-lighter text-decoration-underline"><b style="font-size: 14px; color: gray;">Программирование</b></p></div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-4">

                        <!--карусель-->
                        <div class="karysel">

                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://img-gorod.ru/28/382/2838218_detail.jpg" class="d-block w-100 ">
                                    </div>

                                    <div class="carousel-item ">
                                        <img src="https://img-gorod.ru/28/382/2838218_1.jpg" class="d-block w-100">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="https://img-gorod.ru/28/382/2838218_2.jpg" class="d-block w-100">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="https://img-gorod.ru/28/382/2838218_3.jpg" class="d-block w-100">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="https://img-gorod.ru/28/382/2838218_4.jpg" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://img-gorod.ru/28/382/2838218_5.jpg" class="d-block w-100">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Предыдущий</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Следующий</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <!--правый блок-->

                    <div class="col-8">


                        <div class="zaklad">
                            <div class="d-flex justify-content-center">
                                <p class="fw-lighter"><span class="align-middle"><b style="font-size: 16px; color: black;">Добавить в Закладки</b></span></p>
                            </div>
                        </div>

                        <div class="tema">
                            <span class="align-middle"><b style="font-size: 22px;">Web на практике. CSS, HTML, JavaScript, MySQL, PHP для fullstack-<br>разработчиков</b></span>
                        </div>

                        <div class="avtor">
                            <p class="fw-lighter"><b style="font-size: 14px; color: #29abe1; ">Кириченко А., Никольский А., Дубовик Е.</b></p>
                        </div>


                        <div class="container">
                            <div class="row">
                                <div class="ocenka d-flex">
                                    <div class="col-6 col-md-4">
                                        <div class="d-flex bd-highlight mb-3">
                                            <div class="p-2 bd-highlight"><p class="fw-lighter"><b style="font-size: 16px; color: orange;"> &#9733;&nbsp;</b> 3.00</p></div>
                                            <div class="p-2 bd-highlight"><p class="fw-lighter"><b style="font-size: 16px; color: gray;">1 оценка</b></p></div>
                                            <div class="p-2 bd-highlight"><a href="#" class="dot"><p class="fw-lighter text-decoration-underline"><b style="font-size: 14px; color: #29abe1; ">Оценить</b></p></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="d-flex bd-highlight mb-3">
                                            <div class="p-2 bd-highlight"><p class="fw-lighter"><b style="font-size: 14px; color: gray;">0 отзывов</b></p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="container">

                                        <!--характеристика-->

                                        <div class="harakteristika">
                                            <div class="row">
                                                <div class="col-6 col-sm-3">ID товара</div>
                                                <div class="col-6 col-sm-3">2838218</div>

                                                <!-- Force next columns to break to new line -->
                                                <div class="w-100"></div>

                                                <div class="col-6 col-sm-3">Издательство</div>
                                                <div class="col-6 col-sm-3">Наука и Техника СПб</div>

                                                <div class="w-100"></div>

                                                <div class="col-6 col-sm-3">Год издания</div>
                                                <div class="col-6 col-sm-3">2021</div>

                                                <div class="w-100"></div>

                                                <div class="col-6 col-sm-3">ISBN</div>
                                                <div class="col-6 col-sm-3">978-5-94387-271-6</div>

                                                <div class="w-100"></div>

                                                <div class="col-6 col-sm-3">Кол-во страниц</div>
                                                <div class="col-6 col-sm-3">432</div>

                                                <div class="w-100"></div>

                                                <div class="col-6 col-sm-3">Формат</div>
                                                <div class="col-6 col-sm-3">23.5 x 16.5 x 1.6</div>

                                                <div class="w-100"></div>

                                                <div class="col-6 col-sm-3">Тип обложки</div>
                                                <div class="col-6 col-sm-3">Мягкая бумажная</div>

                                                <div class="w-100"></div>

                                                <div class="col-6 col-sm-3">Тираж</div>
                                                <div class="col-6 col-sm-3">1400</div>

                                                <div class="w-100"></div>

                                                <div class="col-6 col-sm-3">Вес, г</div>
                                                <div class="col-6 col-sm-3">400</div>

                                                <div class="w-100"></div>

                                                <div class="col-6 col-sm-3">Возрастные ограничения</div>
                                                <div class="col-6 col-sm-3">12+</div>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-4">

                                    <!--цена-->

                                    <div class="PravOtdel">
                                        <div class="PravOtdelText">
                                            <div class="p-2 bd-highlight"><p class="fw-lighter"><b style="font-size: 14px; color: #47a150;">&#10004; В наличии:</b><b style="font-size: 14px; color: black;"> 9 шт</b></p></div>
                                            <div class="d-flex justify-content-start">
                                                <div class="p-2 bd-highlight"><b style="font-size: 25px; color: black;">635 &#8381;</b></div>
                                                <div class="p-2 bd-highlight"><a href="#" class="dot"><p class="fw-lighter text-decoration-underline"><b style="font-size: 14px; color: #29abe1; "> до 15 бонусов</b></p></a></div>
                                            </div>

                                            <button type="button" class="btn btn-primary btn-lg">Купить</button>

                                        </div>
                                    </div>

                                    <div class="niz">
                                        <p class="fw-lighter"><b style="font-size: 12px; color: gray;">Цена в интернет-магазине может отличаться от цены в магазинах сети. Оформление книги может не совпадать с представленным на сайте</b></p>
                                        <p class="fw-lighter"><b style="font-size: 14px; color: #29abe1; ">В наличии в 331 магазине.<br>Посмотреть на карте</b></p>
                                        <img src="img_header_and_messager/messendger.png" class="d-block w-50">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--аннотация-->

        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <div class="annotacia">
                        <div class="annotacia1">
                            Аннотация
                        </div>

                        <div class="annotacia2">
                            <p>
                                Разработка многофункционального сайта, как правило, требует нескольких разных специалистов, но в данной книге мы расскажем, как все сделать самому! Fullstack-разработчик — это разработчик, который обладает знаниями всех технологий (полным стеком) для создания полноценных многофункциональных веб-сайтов. Данная книга посвящена Fullstack-разработке сайта. В книге рассмотрен полный цикл создания полноценных сайтов и Интернет-порталов:
                            </p>
                            <p>
                                • Идея или постановка целей и задач сайта.
                            </p>
                            <p>
                                • Создание макета дизайна сайта.
                            </p>
                            <p>
                                • Верстка. Создание frontend’a.
                            </p>
                            <p>
                                • Программирование backend’a.
                            </p>
                            <p>
                                • Базовое наполнение контентом.
                            </p>
                            <p>
                                • Разворачивание на хостинге.
                            </p>
                            <p>
                                В книге приведено описание всех ключевых технологий web-разработки (HTML5, CSS3, JavaScript, PHP, MySQL), знание которых необходимо fullstack-разработчикам.
                            </p>
                            <p>
                                Также приведен и разобран реальный пример разработки полноценного образовательного Интернет-портала (его фронтенда и бэкенда), исходные коды которого можно скачать с сайта издательства.
                            </p>
                        </div>

                        <div class="annotacia3">
                            Сообщить о неточности в описании
                        </div>
                    </div>
                </div>
                <div class="col-3">

                </div>
            </div>
        </div>


        <!--другие книги-->
        <div class="knigi">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <b style=" font-size: 18px; color: #29abe1;">Новинки раздела</b>
                </div>

                <div class="d-flex">
                    <p class="fw-lighter"><b style="padding-bottom: -20px; font-size: 16px; color: #29abe1;"><pre>Смотреть все ></pre></b></p>
                </div>
            </div>
        </div>

        <div class="p-2 container-xxl row justify-content-between">
            <div class="col-lg-2">
                <div class="cardd">
                    <div class="cardd2">
                        <div class="bkar d-flex align-items-center">
                            <img class="card-img-top" src="https://img-gorod.ru/28/603/2860349_preview.jpg" alt="Card image cap" height="200">
                        </div>
                        <div class="card-body">
                            <a href="#!" class="pohcher"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Разум: от начала до конца. Новый взгляд на эволюцию</b><br><b style="font-size: 14px; color: gray;">Деннет Д.</b></p></a> <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <b style="font-size: 16px; line-height: 30px; margin-top: 10px;">844 &#8381</b>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="nav-link kor" href="#!"> Купить <br></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="cardd">
                    <div class="cardd2">
                        <div class="bkar d-flex align-items-center">
                            <img class="card-img-top" src="https://img-gorod.ru/28/680/2868029_preview.jpg" alt="Card image cap" height="200">
                        </div>
                        <div class="card-body">
                            <a href="#!" class="pohcher"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Гик в Японии: вдохновляющий гид по</b><br><b style="font-size: 14px; color: gray;">Гарсиа Э.</b></p></a> <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <b style="font-size: 16px; line-height: 30px;">1059 &#8381</b>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="nav-link kor" href="#!"> Купить <br></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="cardd">
                    <div class="cardd2">
                        <div class="d-flex align-items-center">
                            <img class="card-img-top" src="https://img-gorod.ru/28/703/2870336_preview.jpg" alt="Card image cap" height="200">
                        </div>
                        <div class="card-body">
                            <a href="#!" class="pohcher"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Искусство XX века. Ключи к пониманию. События,</b><br><b style="font-size: 14px; color: gray;">Аксенова А.</b></p></a> <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <b style="font-size: 16px; line-height: 30px;">623 &#8381</b>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="nav-link kor" href="#!"> Купить <br></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="cardd">
                    <div class="cardd2">
                        <div class="bkar d-flex align-items-center">
                            <img class="card-img-top" src="https://img-gorod.ru/28/703/2870358_preview.jpg" alt="Card image cap" height="200">
                        </div>
                        <div class="card-body">
                            <a href="#!" class="pohcher"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Китайский язык. Полная грамматика в схемах и</b><br><b style="font-size: 14px; color: gray;">Ивченко Т.</b></p></a> <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <b style="font-size: 16px; line-height: 30px;">934 &#8381</b>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="nav-link kor" href="#!"> Купить <br></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="cardd">
                    <div class="cardd2">
                        <div class="bkar d-flex align-items-center">
                            <img class="card-img-top" src="https://img-gorod.ru/28/431/2843195_preview.jpg" alt="Card image cap" height="200">
                        </div>
                        <div class="card-body">
                            <a href="#!" class="pohcher"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Паттерны программирования игр</b><br><b style="font-size: 14px; color: gray;">Нистрем Р.</b></p></a> <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <b style="font-size: 16px; line-height: 30px;">1269 &#8381</b>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="nav-link kor" href="#!"> Купить <br></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!------------------------------------------------------------>

        <div class="knigi">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <b style=" font-size: 18px; color: #29abe1;">Лучшие продажи раздела</b>
                </div>

                <div class="d-flex">
                    <p class="fw-lighter"><b style="padding-bottom: -20px; font-size: 16px; color: #29abe1;"><pre>Смотреть все ></pre></b></p>
                </div>
            </div>
        </div>

        <div class="p-2 container-xxl row justify-content-between">
            <div class="col-lg-2">
                <div class="cardd">
                    <div class="cardd2">
                        <div class="bkar d-flex align-items-center">
                            <img class="card-img-top" src="https://img-gorod.ru/26/978/2697802_preview.jpg" alt="Card image cap" height="200">
                        </div>
                        <div class="card-body">
                            <a href="#!" class="pohcher"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Биология добра и зла. Как наука объясняет наши</b><br><b style="font-size: 14px; color: gray;">Сапольски Р.</b></p></a> <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <b style="font-size: 16px; line-height: 30px; margin-top: 10px;">992 &#8381</b>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="nav-link kor" href="#!"> Купить <br></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="cardd">
                    <div class="cardd2">
                        <div class="bkar d-flex align-items-center">
                            <img class="card-img-top" src="https://img-gorod.ru/25/763/2576389_preview.jpg" alt="Card image cap" height="200">
                        </div>
                        <div class="card-body">
                            <a href="#!" class="pohcher"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Грокаем алгоритмы</b><br><b style="font-size: 14px; color: gray;">Бхаргава А.</b></p></a> <br><br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <b style="font-size: 16px; line-height: 30px;">1059 &#8381</b>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="nav-link kor" href="#!"> Купить <br></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="cardd">
                    <div class="cardd2">
                        <div class="d-flex align-items-center">
                            <img class="card-img-top" src="https://img-gorod.ru/26/022/2602293_preview.jpg" alt="Card image cap" height="200">
                        </div>
                        <div class="card-body">
                            <a href="#!" class="pohcher"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Sapiens. Краткая история человечества</b><br><b style="font-size: 14px; color: gray;">Харари Ю.</b></p></a> <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <b style="font-size: 16px; line-height: 30px;">687 &#8381</b>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="nav-link kor" href="#!"> Купить <br></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="cardd">
                    <div class="cardd2">
                        <div class="bkar d-flex align-items-center">
                            <img class="card-img-top" src="https://img-gorod.ru/20/471/2047176_preview.jpg" alt="Card image cap" height="200">
                        </div>
                        <div class="card-body">
                            <a href="#!" class="pohcher"><p class="fw-lighter"><b style="font-size: 14px; color: black;">Совершенный код: Пракртическое руководство</b><br><b style="font-size: 14px; color: gray;">Макконнелл С.</b></p></a> <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <b style="font-size: 16px; line-height: 30px;">1395 &#8381</b>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="nav-link kor" href="#!"> Купить <br></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="cardd">
                    <div class="cardd2">
                        <div class="bkar d-flex align-items-center">
                            <img class="card-img-top" src="https://img-gorod.ru/21/481/2148182_preview.jpg" alt="Card image cap" height="200">
                        </div>
                        <div class="card-body">
                            <a href="#!" class="pohcher"><p class="fw-lighter"><b style="font-size: 14px; color: black;">C++ для нвчинающих</b><br><b style="font-size: 14px; color: gray;">Шилдт Г.</b></p></a> <br><br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <b style="font-size: 16px; line-height: 30px;">561 &#8381</b>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="nav-link kor" href="#!"> Купить <br></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php include('footer.php');?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>