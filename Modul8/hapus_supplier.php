<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM supplier WHERE id_supplier = $id"; 
    if ($conn->query($query) === TRUE) {
        header("Location: supplier.php?pesan=sukses_hapus");
    } else {
        header("Location: supplier.php?pesan=gagal_hapus");
    }
} else {
    header("Location: supplier.php?pesan=gagal_hapus");
}

$conn->close();
?>
