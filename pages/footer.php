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
    <form method="POST" action="api/add_operation.php">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Форма отправки денег</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="users">Выберите команду:</label>
                    <select class="form-control" id="users" name="user">
                        <?php include("api/get_users.php"); ?>
                    </select>

                    <label for="PLT">Количество PLT:</label>
                    <input name="score" type="number" min="0.00" step="0.001" value="1.00" id="PLT" class="form-control"
                        placeholder="цена">

                    <label for="PLT">Коментарий:</label>
                    <input name="comment" type="text" class="form-control" id="comment" placeholder="Введите сообщение команде">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </div>
        </div>
    </form>
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