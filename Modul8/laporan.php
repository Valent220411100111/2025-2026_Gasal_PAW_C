<?php
include 'header.php';

$dataTabel = [];
$totalPendapatan = 0;
$totalPelanggan = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    $sql = "SELECT transaksi.id, transaksi.waktu_transaksi, pelanggan.nama, transaksi.keterangan, transaksi.total FROM transaksi JOIN pelanggan ON transaksi.id = pelanggan.id WHERE transaksi.waktu_transaksi BETWEEN '$startDate' AND '$endDate'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query gagal: " . $conn->error);
    }

    while ($row = $result->fetch_assoc()) {
        $dataTabel[] = $row;
        $totalPendapatan += $row["total"];
    }

    $totalPelanggan = count(array_unique(array_column($dataTabel, 'nama')));
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Laporan Penjualan</h2>

    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="laporan.php">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="startDate" class="form-label">Tanggal Mulai</label>
                        <input type="date" id="startDate" name="startDate" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="endDate" class="form-label">Tanggal Selesai</label>
                        <input type="date" id="endDate" name="endDate" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary w-100">Tampilkan Laporan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (!empty($dataTabel)) { ?>
        <div class="mb-3">
            <button onclick="window.print()" class="btn btn-warning">
                <i class="bi bi-printer"></i> Cetak
            </button>
            <form action="export_excel.php" method="POST" style="display: inline;">
                <input type="hidden" name="startDate" value="<?php echo $startDate; ?>">
                <input type="hidden" name="endDate" value="<?php echo $endDate; ?>">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                </button>
            </form>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pelanggan</h5>
                        <p class="card-text display-4"><?php echo $totalPelanggan; ?></p>
                        <p class="text-muted">Orang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendapatan</h5>
                        <p class="card-text display-4">Rp<?php echo number_format($totalPendapatan, 0, ',', '.'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Grafik Transaksi</h5>
            </div>
            <div class="card-body">
                <canvas id="transaksiChart"></canvas>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Detail Transaksi</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Keterangan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dataTabel as $transaksi) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $transaksi['id']; ?></td>
                                    <td><?php echo date("d-M-Y", strtotime($transaksi['waktu_transaksi'])); ?></td>
                                    <td><?php echo $transaksi['nama']; ?></td>
                                    <td><?php echo $transaksi['keterangan']; ?></td>
                                    <td>Rp<?php echo number_format($transaksi['total'], 0, ',', '.'); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <style>
            @media print {
                .btn, form[action="export_excel.php"] {
                    display: none !important;
                }
                .navbar {
                    display: none !important;
                }
                body {
                    margin: 0 !important;
                }
                .container {
                    max-width: 100% !important;
                }
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('transaksiChart').getContext('2d');
            var transaksiChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_column($dataTabel, 'waktu_transaksi')); ?>,
                    datasets: [{
                        label: 'Total Transaksi',
                        data: <?php echo json_encode(array_column($dataTabel, 'total')); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        </script>
    <?php } ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>