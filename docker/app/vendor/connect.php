<?php

    $connect = mysqli_connect('localhost', 'user', 'password', 'Testings');

    if (!$connect) {
        die('Error connect to DataBase');
    }