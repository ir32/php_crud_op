<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $body = $_POST['body'];

    // Update the database with new values
    $sql = "UPDATE food SET name='$name', body='$body' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . $conn->error;
    }
}
?>
