<?php

    session_start();
    require_once './connect.php';

    $login      = $_POST['login'];
    $password   = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT users.id, users.login, users.isAdmin, Teams.name as view FROM `users` left join Teams on users.id = Teams.user_id WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['login'],
            "isadmin" => $user['isAdmin'],
            "view" => $user['view'],
        ];

        header('Location: ../teams.php');
    } 
    else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
    }
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
