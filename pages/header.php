<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['name'];
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MIC - Очки команды</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link disabled" href="#"><span class="badge text-bg-info">
                    <?= $username ?>
                </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="helper/logout.php">Выход</a>
        </li>
    </ul>