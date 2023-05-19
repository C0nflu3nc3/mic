<?php
session_start();
require_once 'vendor/connect.php';

if (isset($_SESSION['user'])) {
  $isAdmin = $_SESSION['user']['isadmin']; 
  $condition = "";
  $username = $_SESSION['user']['name']; 
     
  if (!$isAdmin) {
    $TeamsId = $_SESSION['user']['id'];
    $condition = 'where Teams.user_id ='.$TeamsId;
    
    
    /*ob_flush();
        ob_start();
        while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
            var_dump($data);  
        }
        file_put_contents(__DIR__ . '/log.txt', ob_get_flush(), FILE_APPEND);*/
    }
    
    $querytext = 'SELECT `name` as `Name`, SUM(`Score`) as `Scores` FROM `Teams` JOIN `Operation` ON Teams.user_id = Operation.Team '.$condition.' GROUP by `name`';
    $queryScore = mysqli_query($connect, $querytext);
    ////////////////////////////////////////////////////
    $querytext = 'SELECT `name` as `Name`, `Score`, `Period`,`Comment` FROM `Teams` JOIN `Operation` ON Teams.user_id = Operation.Team '.$condition.' ORDER by `Period`';
    $queryOperation = mysqli_query($connect, $querytext);
    /*ob_flush();
        ob_start();
        while($data = mysqli_fetch_array($queryOperation,MYSQLI_ASSOC)){
            var_dump($data);  
        }
        file_put_contents(__DIR__ . '/log.txt', ob_get_flush(), FILE_APPEND);*/
}
else header('Location: /');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div>
        <?= $username?>
        <a href="vendor/logout.php" class="logout">Выход</a>
    </div>
    <div>
        <table width="100%" style="margin 50px 0" height="50">
            <tr>
                <th colspan="5">Счёт твоей команды</th>
            </tr>
            <tr>
                <th style="width: 100px;">Название команды:</th>
                <th style="width: 100px;">Очки:</th>
            </tr>
            <?php
            while($data = mysqli_fetch_array($queryScore,MYSQLI_ASSOC)){
                ?>
            <tr>
                <td><?= $data['Name']?></td>
                <td><?= $data['Scores']?></td>
            </tr>
            <?php
            }   
        ?>
        </table>
    </div>

    <div>
        <table width="100%" style="margin 50px 0" height="50">
            <tr>
                <th colspan="5">Операции</th>
            </tr>
            <tr>
                <th style="width: 100px;">Период:</th>
                <th style="width: 100px;">Название команды:</th>
                <th style="width: 100px;">Очки:</th>
                <th style="width: 100px;">Комментарий:</th>
            </tr>
            <?php
            while($data = mysqli_fetch_array($queryOperation,MYSQLI_ASSOC)){
                ?>
            <tr>
                <td><?= $data['Period']?></td>
                <td><?= $data['Name']?></td>
                <td><?= $data['Score']?></td>
                <td><?= $data['Comment']?></td>
            </tr>
            <?php
            }   
        ?>
        </table>
    </div>
        <div>
        <form action="send1.php">
        <button type="submit">Отправить деньги</button>
        </div>

</body>

</html>