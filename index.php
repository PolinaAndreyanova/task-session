<?php
session_start();

if (isset($_GET['button'])) {
    // $_SESSION['time'] = time();
    
    $_SESSION = [];
    unset($_COOKIE[session_name()]);
    session_destroy();

    $host  = $_SERVER['HTTP_HOST'];

    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}

if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = time();
}

$firstEntry = time() - $_SESSION['time'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <title>Форма</title>
</head>
<body class="content">
    <form class="content__form" method="get">
        <p>Пользователь зашёл на страницу <?=$firstEntry?> секунд назад</p>
        <button class="content__button" name="button" type="submit">Сбросить данные</button>
    </form>
</body>
</html>