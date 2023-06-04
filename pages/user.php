<?php

if (!isset($_SESSION)) {
    session_start();
}

$TeamsId = $_SESSION['user']['id'];
$condition = 'where Teams.user_id =' . $TeamsId;

// SQL query
$sql = "SELECT SUM(Score)score FROM `Operation` WHERE Team = ?;";
$stmt = $connect->prepare($sql);

$stmt->bind_param("i", $TeamsId);

$stmt->execute();
$result = $stmt->get_result();

if ($result) {

    while ($row = $result->fetch_assoc()) {
        echo "<h3>Пилтоны твоей команды:<span class=\"badge text-bg-success\">" . $row["score"] . "</span></h3>";
    }
    $result->close();

} else {
    echo "Error executing the query: " . $connect->error;
}

// Close the connection

?>

