<?php
    $sql = "SELECT id, login FROM users";
    $result = mysqli_query($connect, $sql);
if ($result) {
    // Process the retrieved data
    while ($row = mysqli_fetch_assoc($result)) {
        // Access individual fields using $row['field_name']
        echo '<option value="'. $row['id'] .'">' . $row['login'] . '</option>';
    }
} else {
    echo "Error executing the query: " . mysqli_error($connect);
}

?>
