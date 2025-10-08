<?php

$nilai = 85; // contoh nilai mahasiswa
if ($nilai >= 90) {
$grade = "A";
} elseif ($nilai >= 80) {
$grade = "B";
} elseif ($nilai >= 70) {
$grade = "C";
} elseif ($nilai >= 60) {
$grade = "D";
} else {
$grade = "E";
}

echo "Nilai Anda: $nilai <br>";
echo "Grade Anda: $grade";
?>
