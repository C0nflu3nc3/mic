<?php
require_once '../helper/connect.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if ($_POST["user"] == $_POST["parent"]) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } 

    //Получаем команду поулчателя
    $sql = "SELECT Name FROM Teams WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $_POST["user"]);
    $stmt->execute();
    $stmt->bind_result($NameCommand); 
    $stmt->fetch();  
    $stmt->close();

    //Готовим данные
    $sql = "INSERT INTO Operation (Period, Score, Team, Comment) VALUES (CURDATE(), ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sis", $score, $user, $comment);

    ///добавляем в указанную команду
    $score = intval($_POST["score"]);
    $user =  $_POST["user"];
    $comment = $_POST["comment"];
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }
    ///Убираем из текущей команды
    $score = -1*$score;
    $user =  $_POST["parent"];
    $comment .= ": Передача  PLT команде ".$NameCommand;
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();

    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } 
}


?>