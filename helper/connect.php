<?php

    $servername = "mysql";
    $username = "mic";
    $password = "180780Kaf!";
    $dbname = "micbd";

    try {
        $connect = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$connect) {
            throw new Exception("Ошибка соединения с базой: " . mysqli_connect_error());
        }
        // mysqli_close($connect);
    } catch (Exception $e) {
        // Catch any exceptions that occurred during the connection attempt
        echo "Error: " . $e->getMessage();
    }
    ?>