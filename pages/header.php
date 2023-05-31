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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class='container-fluid text-center'>
        <div class="row header">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">
                    <span class="badge text-bg-info"><?= $username ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vendor/logout.php">Выход</a>
                </li>
            </ul>
        </div>
    </div>