<?php
include 'header.php';
?>

<div class="container mt-5">
    <h2 class="text-center">Data Pelanggan</h2>
    <div class="d-flex justify-content-between mb-3">
        <a href="tambah_pelanggan.php" class="btn btn-primary">Tambah Pelanggan</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Kelamin</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($pelanggan = mysqli_fetch_assoc($data_pelanggan)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pelanggan['nama'] ?></td>
                    <td><?= $pelanggan['jenis_kelamin'] ?></td>
                    <td><?= $pelanggan['telp'] ?></td>
                    <td><?= $pelanggan['alamat'] ?></td>
                    <td>
                        <a href="edit_pelanggan.php?id=<?= $pelanggan['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                        <a href="hapus_pelanggan.php?id=<?= $pelanggan['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>