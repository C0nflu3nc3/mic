<?php

    $connect = mysqli_connect('localhost', 'root', '', 'micgoods');

    if (!$connect) {
        die('Error connect to DataBase');
    }