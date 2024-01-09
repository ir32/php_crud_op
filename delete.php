<?php
include('conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record with the given ID from the database
    $deleteQuery = "DELETE FROM food WHERE id = $id";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
