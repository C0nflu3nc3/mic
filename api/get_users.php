<?php
    if (!$isAdmin) {
        $condition = 'where Teams.id <> ' . $TeamsId;
    }
    $sql = "SELECT Teams.id, Teams.name, users.isAdmin FROM Teams join users on Teams.user_id = users.id ". $condition;
    $result = mysqli_query($connect, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'. $row['id'] .'"'.( $row['isAdmin']  ? ' selected="selected"' : '' ).'">' . $row['name']  . '</option>';
    }
} else {
    echo "Error executing the query: " . mysqli_error($connect);
}

?>
