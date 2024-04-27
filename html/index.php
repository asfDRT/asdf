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
                <h1 class="hello">Страница постов!</h1>
            <?php
            if (!isset($_COOKIE['User'])) {
            ?>
                <div class="hello"><a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>, чтобы просматривать контент!</div>
            <?php
            } else {
                $link = mysqli_connect('db', 'root', '1234', 'pt_start_web');
                $sql = "SELECT * FROM posts";
                $result = mysqli_query($link, $sql);

                if (mysqli_num_rows($result) > 0){
                    while ($post = mysqli_fetch_array($result)){
                        echo "<br><a class='silka' href='/posts.php?id=" . $post['id'] . "'>" . $post['title'] . "</a></br>";
                    }
                }else{
                    echo "Записей пока нету";
                }
            }
            ?>    
            </div>
        </div>    
    </div>
</body>

</html>