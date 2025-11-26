<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$data_transaksi = mysqli_query($conn, "SELECT transaksi.*, pelanggan.nama FROM transaksi JOIN pelanggan ON transaksi.id = pelanggan.id");
$data_transaksi_detail = mysqli_query($conn, "SELECT transaksi_detail.*, barang.nama_barang FROM transaksi_detail JOIN barang ON transaksi_detail.transaksi_id = barang.id");
$data_barang = mysqli_query($conn, "SELECT * FROM barang");
$data_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$data_supplier = mysqli_query($conn, "SELECT * FROM supplier");
$data_user = mysqli_query($conn, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <style>
        body {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: grey;
            color: white;
            text-align: center;
        }

        button,
        a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#">Sistem Penjualan</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php if ($_SESSION['level'] == "Owner") : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dataMasterDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Data Master</a>
                            <ul class="dropdown-menu" aria-labelledby="dataMasterDropdown">
                                <li><a class="dropdown-item" href="barang.php">Data Barang</a></li>
                                <li><a class="dropdown-item" href="supplier.php">Data Supplier</a></li>
                                <li><a class="dropdown-item" href="pelanggan.php">Data Pelanggan</a></li>
                                <li><a class="dropdown-item" href="user.php">Data User</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="laporan.php">Laporan</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            echo $_SESSION['username'];
                            ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profil Saya</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>