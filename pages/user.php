<?php

require 'api/functions.php';

if (!isset($_SESSION)) {
    session_start();
}

$TeamsId = $_SESSION['user']['id'];

$condition = 'where Teams.user_id =' . $TeamsId;

echo "<h3>Пилтоны твоей команды:<span class=\"badge text-bg-success\">" . get_plt($connect, $TeamsId) . "</span></h3>";

?>

