<?php
require_once '../helper/connect.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $sql = "INSERT INTO Operation (Period, Score, Team, Comment) VALUES (CURDATE(), ?, ?, ?)";

    // Create a prepared statement
    $stmt = $connect->prepare($sql);

    $stmt->bind_param("sis", $_POST["score"], $_POST["user"], $_POST["comment"]);

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();

    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
    }
}


?>