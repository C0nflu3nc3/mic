<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once 'vendor/connect.php';

$condition = "";

$TeamsId = $_SESSION['user']['id'];
$condition = 'where Teams.user_id =' . $TeamsId;

/*ob_flush();
ob_start();
while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
var_dump($data);
}
file_put_contents(__DIR__ . '/log.txt', ob_get_flush(), FILE_APPEND);*/


$querytext = 'SELECT `name` as `Name`, SUM(`Score`) as `Scores` FROM `Teams` JOIN `Operation` ON Teams.user_id =
Operation.Team ' . $condition . ' GROUP by `name`';
$queryScore = mysqli_query($connect, $querytext);
////////////////////////////////////////////////////
$querytext = 'SELECT `name` as `Name`, `Score`, `Period`,`Comment` FROM `Teams` JOIN `Operation` ON Teams.user_id =
Operation.Team ' . $condition . ' ORDER by `Period`';
$queryOperation = mysqli_query($connect, $querytext);
?>

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
                while ($data = mysqli_fetch_array($queryScore, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td>
                            <?= $data['Name'] ?>
                        </td>
                        <td>
                            <?= $data['Scores'] ?>
                        </td>
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
            while ($data = mysqli_fetch_array($queryOperation, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td>
                        <?= $data['Period'] ?>
                    </td>
                    <td>
                        <?= $data['Name'] ?>
                    </td>
                    <td>
                        <?= $data['Score'] ?>
                    </td>
                    <td>
                        <?= $data['Comment'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>