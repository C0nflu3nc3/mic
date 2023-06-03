<?php
if (!isset($_SESSION)) {
    session_start();
}

/*ob_flush();
ob_start();
while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
var_dump($data);
}
file_put_contents(__DIR__ . '/log.txt', ob_get_flush(), FILE_APPEND);*/

$querytext = 'SELECT `name` as `Name`, SUM(`Score`) as `Scores` FROM `Teams` JOIN `Operation` ON Teams.user_id =
Operation.Team GROUP by `name`';
$queryScore = mysqli_query($connect, $querytext);
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
</div>