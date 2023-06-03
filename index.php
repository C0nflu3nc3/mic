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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
    <title>MIC - Авторизация</title>
</head>

<body>
    <div class='container-fluid text-center'>
        <div class="row header"></div>
        <div class="row content">
            <div class='col-5'></div>
            <div class='col-2'>
                <form action="helper/signin.php" method="post">
                    <p class="text-center">Авторизация</p>
                    <div class="form-outline mb-4 text-start">
                        <label class="form-label" for="login">Логин</label>
                        <input type="text" name="login" id="login" class="form-control" placeholder="Введите свой логин" />
                    </div>

                    <div class="form-outline mb-4 text-start">
                        <label class="form-label" for="password">Пароль</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Введите пароль"/>
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
            <div class='col-5'></div>
        </div>
</body>
</html> 