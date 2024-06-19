<?php
require_once('db.php');
$login = $_POST['login'];
$pass = $_POST['pass'];
$repeat = $_POST['repeatpass'];
$email = $_POST['email'];

if (empty($login) || empty($pass) || empty($repeat) || empty($email)) {
    echo "Заполните все поля";
} else {
    if ($pass != $repeat) {
        echo "Пароли не совпадают";
    } else {
        if (isset($_FILES['avatar'])) {
            $avatar_name = $_FILES['avatar']['name'];
            $avatar_tmp_name = $_FILES['avatar']['tmp_name'];
            $avatar_path = "avatars/" . $avatar_name;

            $sql = "INSERT INTO  `users` (login, pass, email, avatar) VALUES ('$login', '$pass', '$email', '$avatar_name')";
            if ($conn->query($sql) === TRUE) {
                if (move_uploaded_file($avatar_tmp_name, $avatar_path)) {
                    echo "Поздравляем, вы зарегистрированы!";
                } else {
                    echo "Ошибка при загрузке файла";
                }
            } else {
                echo "Ошибка: " . $conn->error;
            }
        } else {
            echo "Файл аватара не был загружен";
        }
    }
}
?>



