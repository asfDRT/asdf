<?php
// конфиг
$servername = "db";
$username = "root";
$password = "1234";
$dbName = "pt_start_web";

// Подключение к бд
$link = mysqli_connect($servername, $username, $password);

// Обработка ошибоки подключения
if (!$link){
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Созадние бд
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

// Обработка ошибоки создания бд
if (!mysqli_query($link, $sql)){
    echo "Не удалось создать базу данных";
}

mysqli_close($link);

// Подключаемся и пытаемся создать таблицу
$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(20) NOT NULL
)";

// Обработка ошибки создания таблицы
if (!mysqli_query($link, $sql)){
    echo "Не удалось создать таблицу users";
}

// Создание таблицы posts
$sql = "CREATE TABLE IF NOT EXISTS posts(
    id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text VARCHAR(400) NOT NULL
)";

if (!mysqli_query($link, $sql)){
    echo "Не удалось создать таблицу posts";
}

mysqli_close($link);


?>