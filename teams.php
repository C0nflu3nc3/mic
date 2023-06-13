<?php
session_start();
require_once 'helper/connect.php';
//если пользователя нетю идем на главную
if (isset($_SESSION['user'])) {
    $isAdmin = $_SESSION['user']['isadmin'];
    $condition = "";

    include("pages/header.php");
    
    if ($isAdmin) {
        include('pages/admin.php');
    }
    else
    {
        include('pages/user.php');
    }
    include("pages/base-content.php");
    include("pages/footer.php");

} else
    header('Location: /');
    /*ob_flush();
    ob_start();
    while($data = mysqli_fetch_array($queryOperation,MYSQLI_ASSOC)){
        var_dump($data);  
    }
    file_put_contents(__DIR__ . '/log.txt', ob_get_flush(), FILE_APPEND);*/
?>
