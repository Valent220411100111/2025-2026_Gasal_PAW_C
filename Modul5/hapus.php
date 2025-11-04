<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM supplier WHERE id_supplier = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
