<?php
$nama = $_GET['nama'] ?? 'Valent';
$nim = $_GET['nim'] ?? '22111';
$jurusan = $_GET['jurusan'] ?? 'Teknik Informatika';

echo "<table border='1'>
<tr><th>Nama</th><td>$nama</td></tr>
<tr><th>NIM</th><td>$nim</td></tr>
<tr><th>Jurusan</th><td>$jurusan</td></tr>
</table>";
?>