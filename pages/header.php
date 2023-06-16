<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['view'];
}
require 'api/functions.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MIC - Очки команды</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class='container-fluid text-center' id="header">
        <div class="row header white cartheader">
            <label class="text-center" id="site-name">ПИЛТОВЕР</label>
            <ul class="nav justify-content-end" id="user-controls">
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"><span class="badge text-bg-info">
                            <?= $username ?>
                        </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="helper/logout.php">Выход</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">