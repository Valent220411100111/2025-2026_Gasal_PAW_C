<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Cek password dengan MD5 atau plain text
        if (md5($password) === $user['password'] || $password === $user['password']) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = ($user['level'] == '1' ? "Owner" : "Kasir");
            header("Location: index.php");
            exit;
        } else {
            header("Location: login.php?error=1");
            exit;
        }
    } else {
        header("Location: login.php?error=1");
        exit;
    }
}
?>