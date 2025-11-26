<?php
    include 'koneksi.php';

    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=laporan_penjualan.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "<table border='1'>";
    echo "<tr><th colspan='3'>Rekap Laporan Penjualan $startDate sampai $endDate</th></tr>";
    echo "<tr></tr>";

    echo "<tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>";

    $sql = "SELECT
                transaksi.total AS total,
                transaksi.waktu_transaksi AS waktu_transaksi,
                pelanggan.nama_pelanggan 
            FROM transaksi 
            JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan 
            WHERE transaksi.waktu_transaksi BETWEEN '$startDate' AND '$endDate'";

    $result = $conn->query($sql);

    $total_pendapatan = 0;
    $jumlah_pelanggan = 0;
    $no = 1;

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>Rp" . number_format($row['total'], 0, ',', '.') . "</td>";
            echo "<td>" . date("d-M-y", strtotime($row['waktu_transaksi'])) . "</td>";
            echo "</tr>";
            $total_pendapatan += $row['total'];
            $jumlah_pelanggan++;
        }
    } else {
        echo "<tr><td colspan='3'>Tidak ada data yang ditemukan.</td></tr>";
    }

    echo "<tr></tr>";

    echo "<tr>
            <th>Jumlah Pelanggan</th>
            <th colspan='2'>Jumlah Pendapatan</th>
        </tr>";

    echo "<tr>
            <td>$jumlah_pelanggan Orang</td>
            <td colspan='2'>Rp" . number_format($total_pendapatan, 0, ',', '.') . "</td>
    </tr>";
    echo "</table>";

    $conn->close();
?>
