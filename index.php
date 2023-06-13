<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']) {
        header('Location: teams.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>MIC - Авторизация</title>
</head>

<body>
    <div class='container-fluid text-center'>
        <div class="row header white"></div>
        <div class="d-flex justify-content-center">
            <div class='col-3'>
                <img src="./static/logo.jpg" title="logo" alt="logo"/>
            </div>
            <div class='col-3'>
                <form action="helper/signin.php" method="post">
                    <p class="text-center">Авторизация</p>
                    <div class="form-outline mb-4 text-start">
                        <label class="form-label" for="login">Логин</label>
                        <input type="text" name="login" id="login" class="form-control"
                            placeholder="Введите свой логин" />
                    </div>

                    <div class="form-outline mb-4 text-start">
                        <label class="form-label" for="password">Пароль</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Введите пароль" />
                    </div>
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($_SESSION['message']) {
                            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                        }
                        unset($_SESSION['message']);
                    }
                    ?>
                    <button type="submit" class="btn btn-primary btn-block mb-4">Войти</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>