<?php
if (!isset($_SESSION)) {
    session_start();
}

$condition = "";

if (!$isAdmin) {
    $TeamsId = $_SESSION['user']['id'];
    $condition = 'where Teams.user_id =' . $TeamsId;
}
/*ob_flush();
ob_start();
while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
var_dump($data);
}
file_put_contents(__DIR__ . '/log.txt', ob_get_flush(), FILE_APPEND);*/

$querytext = 'SELECT `name` as `Name`, `Score`, `Period`,`Comment` FROM `Teams` JOIN `Operation` ON Teams.user_id =
Operation.Team ' . $condition . ' ORDER by `Period`';
$queryOperation = mysqli_query($connect, $querytext);

//$connect->close();
?>
<!-- Button отправки денег -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Отправить деньги команде
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Форма отправки денег</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="users">Выберите команду:</label>
                <select class="form-control" id="users">
                    <?php include("api/get_users.php"); ?>
                </select>

                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </div>
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

</html>