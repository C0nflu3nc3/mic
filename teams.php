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
    <title>MIC - Очки команды</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class='container-fluid text-center'>
        <div class="row header">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"><?= $username?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vendor/logout.php" >Выход</a>
                </li>
            </ul>
        </div>
        <?php if ($isAdmin) {?>
        <div class="row content">
            <div>
                <h3>Очки команд</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Название команды:</th>
                            <th>Итого:</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>
            <div>
                <form action="send1.php">
                <button class="btn btn-primary" type="submit">Отправить деньги</button>
            </div>
            <div>
                <h3>Все события:</h3>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Период:</th>
                        <th>Название команды:</th>
                        <th>Очки:</th>
                        <th>Комментарий:</th>
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
        </div>
        <?php } else {?>
            <h3>Очки твоей команды:</h3>
        <?php }?>
    </div>
</body>

</html>