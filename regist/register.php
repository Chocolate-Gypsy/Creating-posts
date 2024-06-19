<?php
    session_start();
    if ( isset($_SESSION['users']))  {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="main2.css">
</head>
<body>

    <form method="post" enctype="multipart/form-data" action="signin.php">
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите  имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите  логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите почту">
        <label>Изображение </label>
        <input type="file" name="avatar">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="register-btn">Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!
        </p>
    
    </form>
  
</body>
</html>