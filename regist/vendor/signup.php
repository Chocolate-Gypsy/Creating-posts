<?php

// session_start();
// require_once 'connect.php';

// $full_name = $_POST['full_name'];
// $login = $_POST['login'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $password_confirm = $_POST['password_confirm'];

// $check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
// if (mysqli_num_rows($check_login) > 0) {
//     $response = [
//         "status" => false,
//         "type" => 1,
//         "message" => "Такой логин уже существует",
//         "fields" => ['login']
//     ];

//     echo json_encode($response);
//     die();
// }

// $error_fields = [];

// if ($login === '') {
//     $error_fields[] = 'login';
// }

// if ($password === '') {
//     $error_fields[] = 'password';
// }

// if ($full_name === '') {
//     $error_fields[] = 'full_name';
// }

// if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $error_fields[] = 'email';
// }

// if ($password_confirm === '') {
//     $error_fields[] = 'password_confirm';
// }

// if (!$_FILES['avatar']) {
//     $error_fields[] = 'avatar';
// }

// if (!empty($error_fields)) {
//     $response = [
//         "status" => false,
//         "type" => 1,
//         "message" => "Проверьте правильность полей",
//         "fields" => $error_fields
//     ];

//     echo json_encode($response);

//     die();
// }

// if ($password === $password_confirm) {

//     $path = 'uploads/' . time() . $_FILES['avatar']['name'];
//     if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
//         $response = [
//             "status" => false,
//             "type" => 2,
//             "message" => "Ошибка при загрузке аватарки",
//         ];
//         echo json_encode($response);
//     }

//     $password = md5($password);

//     mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");

//     $response = [
//         "status" => true,
//         "message" => "Регистрация прошла успешно!",
//     ];
//     echo json_encode($response);


// } else {
//     $response = [
//         "status" => false,
//         "message" => "Пароли не совпадают",
//     ];
//     echo json_encode($response);
// }



//исходная версия
session_start();
require_once 'connect.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$mail = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];


if ($password === $password_confirm) {

    $check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE login = '$login'");
    if ( $check_users->num_rows== 1) {
        $_SESSION['massage'] = 'Логин занят!!!';
        header('Location: ../register.php');
        exit();
    }

    if(isset($_FILES['avatar'])){
        $path = 'uploads/' .time() .$_FILES['avatar']['name'];
        if ( !move_uploaded_file($_FILES['avatar']['tmp_name'], '../' .$path) ) {
            $_SESSION['massage'] = 'Ошибка загрузки изображения!!!';
            header('Location: ../register.php');
            exit();
        }
    }
    

    $password = md5($password);
    $sql = "INSERT INTO `users` (id,full_name,login,email,password,avatar) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')";
    mysqli_query($connect, $sql);
    $_SESSION['message'] = 'регистрация прошла успешно';
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Пароли не совпадают ';
    header('Location: ../register.php');
}
?> 
