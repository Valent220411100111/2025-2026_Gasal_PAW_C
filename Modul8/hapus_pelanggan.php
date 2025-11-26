<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM pelanggan WHERE id = $id"; 
    if ($conn->query($query) === TRUE) {
        header("Location: pelanggan.php?pesan=sukses_hapus");
    } else {
        header("Location: pelanggan.php?pesan=gagal_hapus");
    }
} else {
    header("Location: pelanggan.php?pesan=gagal_hapus");
}

$conn->close();
?>
