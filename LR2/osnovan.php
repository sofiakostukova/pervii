<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>books</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <?php  include ('header.php'); ?>

        <form class="container pt-3 pb-3" action="index.php" method="GET" name="fillter">
            <div class="price d-flex align-items-center justify-content-center">
                <span style="padding-right: 8px;">Цена от: </span>
                <input style='width: 100px' class="form-control" type="number" name="min">
                <span style="padding: 0 10px;"> до </span>
                <input style='width: 100px' class="form-control " type="number" name="max">
                <input style='width: 400px; margin-left: 40px' class="form-control" name="name" type="text" placeholder="Название товара">
                <select style='width: 200px; margin-left: 40px' class="form-select" name="avtors" aria-label="Default select example">
                    <option selected value="0">Автор:</option>
                    <option value="1">Демидович Б.</option>
                    <option value="2">Асиман А.</option>
                    <option value="3">Шрейер Д.</option>
                    <option value="4">Ивченко Т.</option>
                    <option value="5">Шилдт Г.</option>
                    <option value="6">Сапольски Р..</option>
                </select>
                <button type="submit" class="btn btn-primary"  style='margin-left: 40px; color: white; background-color: #29abe1; border: none;'>Применить</button>
                <a class="btn btn-warning" href="/LR2" style='margin-left: 40px; color: white; background-color: #29abe1; border: none;'>Отчистить</a>
            </div>
        </form>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Изображение</th>
                    <th scope="col">Название</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Цена</th>
                </tr>
            </thead>
            <tbody>
                <?php  include ('tabl.php'); ?>
            </tbody>
        </table>
    </div>


</body>

</html>
