<?php

// session_start();
// require_once 'connect.php';

// $login = $_POST['login'];
// $password = $_POST['password'];

// $error_fields = [];

// if ($login === '') {
//     $error_fields[] = 'login';
// }

// if ($password === '') {
//     $error_fields[] = 'password';
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

// $password = md5($password);

// $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
// if (mysqli_num_rows($check_user) > 0) {

//     $user = mysqli_fetch_assoc($check_user);

//     $_SESSION['user'] = [
//         "id" => $user['id'],
//         "full_name" => $user['full_name'],
//         "avatar" => $user['avatar'],
//         "email" => $user['email']
//     ];

//     $response = [
//         "status" => true
//     ];

//     echo json_encode($response);

// } else {

//     $response = [
//         "status" => false,
//         "message" => 'Не верный логин или пароль'
//     ];

//     echo json_encode($response);
// }
// 


session_start();

require_once 'connect.php';

$login = $_POST['login'];
$password = md5($_POST['password']);

$check_users = mysqli_query($connect, "SELECT * FROM `users` WHERE login = '$login' AND password = '$password'");
$user = mysqli_fetch_assoc($check_users);
if ( $check_users->num_rows== 1) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'full_name' => $user['full_name'],
        'login' => $user['login'],
        'email' => $user['email'],
        'avatar' => $user['avatar']
    ];
    header('Location: ../profile.php');
} else {
    $_SESSION['massage'] = 'Неверный Логин или Пароль!!!';
    header('Location: ../дистант.php');
}





?>
