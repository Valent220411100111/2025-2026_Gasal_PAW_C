<?php

$barang = array("Roti", "Susu", "Telur", "Gula");
$harga = array(5000, 10000, 15000, 12000);
$total = 0;

foreach ($harga as $index => $nilai) {
echo "Barang: " . $barang[$index] . " - Harga: Rp " . $nilai . "<br>";
$total += $nilai;
}
echo "<hr>";
echo "Total Belanja: Rp " . $total;

?>