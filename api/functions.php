<?php
    function get_plt($connect, $team_id) {

        $sql = "SELECT SUM(Score)score FROM `Operation` WHERE Team = ?;";
        $stmt = $connect->prepare($sql);

        $stmt->bind_param("i", $team_id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {

        while ($row = $result->fetch_assoc()) {
            return $row["score"];
        }
        $result->close();

    } else {
        return "Error executing the query: " . $connect->error;
    }
    }

?>
