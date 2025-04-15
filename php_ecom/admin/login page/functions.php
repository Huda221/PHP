<?php
include('db.php'); // Include your database connection

function getAll($tableName) {
    global $conn;
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($conn, $query);

    return $result;
}
?>
