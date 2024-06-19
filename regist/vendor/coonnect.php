<?php

    $connect = mysqli_connect('localhost', 'root', '', 'reg');

    if (!$connect) {
        die('Ошибка');
    }