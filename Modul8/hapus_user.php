<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM user WHERE id_user = $id"; 
    if ($conn->query($query) === TRUE) {
        header("Location: user.php?pesan=sukses_hapus");
    } else {
        header("Location: user.php?pesan=gagal_hapus");
    }
} else {
    header("Location: user.php?pesan=gagal_hapus");
}

$conn->close();
?>
