<?php
    $sql = "SELECT login FROM users";
    $result = mysqli_query($connect, $sql);
if ($result) {
    // Process the retrieved data
    while ($row = mysqli_fetch_assoc($result)) {
        // Access individual fields using $row['field_name']
        echo '<option>' . $row['login'] . '</option>';
    }
} else {
    echo "Error executing the query: " . mysqli_error($connect);
}

?>