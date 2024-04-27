<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.6">       
    <title>Черноусов В.А</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” /> 
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="container nav_bar">
        <div class="nav_logo"></div>
        <div class="nav_text">Бессмысленный текст</div>
    </div>


    <div class="container nnn">
        <div class="row">
            <div class="col-8"> 
                <h2>Бармаглот, вооружившись квантовым калькулятором и надев очки из чистой логики, пытается разгадать древнюю загадку квадратного круга. 
                Он исписывает свитки формулами, строит многомерные графики и даже вызывает духов великих математиков прошлого, но тайна ускользает, как солнечный зайчик в 
                лабиринте зеркал. Тем временем, на заднем плане этой абсурдной сцены, чайник с блестящими хромированными крыльями взмывает в закат, оставляя за собой шлейф 
                ароматного пара и неразгаданных вопросов.</h2>
            </div>
            <div class="col-4"> 
                <div class="row light_meme"></div>
                <div class="row title_photo"><p>Черноусов В.А</p></div>
            </div>
        </div>    
    </div>

    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="myButton">Vim be like</button>
                <p id="demo"></p>
            </div>    
        </div>
    </div>

    <div class="container">
        <div class="row fff">
            <div class="col-12">
                <h1 class="hello">
                    Привет, <?php echo $_COOKIE['User']; ?>   
                </h1>
            </div>
            
            <div class="col-12_form">
                <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text" class="form_input" type="text" name="title" placeholder="Заголовок вашего поста"></input>
                    <textarea name="main_text" cols="30" rows="10" placeholder="Введите текст вашего поста..."></textarea>
                    <br><input type="file" name="file"></br>
                    <button type="submit" class="btn_green btn_reg" name="submit">Сохранить пост!</button>
                </form>
            </div>
        </div>
    </div>


    </div>
<script type="text/javascript" src="js/button.js"></script>
</body>

</html>

<?php
require_once('db.php');

$link = mysqli_connect('db', 'root', '1234', 'pt_start_web');

if (isset($_POST['submit'])){
    $title = $_POST['title'];
    $main_text = $_POST['main_text'];
    if (!$title || !$main_text) die("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    

    if(!mysqli_query($link, $sql)) die("Не удалось добавить пост");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png")))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

}
?>