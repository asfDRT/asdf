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
        <div class="row">
            <div class="col-12">
                <h1 class="h1_bro">Авторизация</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="login.php">
                    <div class="row form_reg"><input class="form" type="text" name="username" placeholder="Login"></div>
                    <div class="row form_reg"><input class="form" type="password" name="pass" placeholder="Password"></div>
                    <button type="sumbit" class="btn_green btn_reg" name="submit">Продолжить</button>
                </form>    
            </div>
        </div>
    </div>
   
</body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('db', 'root', '1234', 'pt_start_web');

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    if (!$username || !$pass) die("Пожалуйства введите все заначения!");

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1){
        setcookie("User", $username, time()+7200);
        header('Location: profile.php');
    }else{
        echo "Не правильно имя или пароль";
    }

}
?>