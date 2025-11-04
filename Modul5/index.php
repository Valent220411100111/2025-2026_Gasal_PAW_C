<?php
include 'connect.php';

$sql = "SELECT * FROM supplier";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabel Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f8ff;
        }
        .container {
            width: 80%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .button {
            padding: 8px 16px;
            margin: 5px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            border-radius: 4px;
            display: inline-block;
        }
        .button-edit { background-color: #FFA500; }
        .button-delete { background-color: #f44336; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Supplier</h2>
        <a href="tambah.php" class="button">Tambah Supplier</a> 
        <table>
            <tr>
                <th>ID Supplier</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_supplier']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['telp']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                    echo "<td>
                            <div style='display: flex; justify-content: center; gap: 10px;'>
                                <a href='edit.php?id=" . $row['id_supplier'] . "' class='button button-edit'>Edit</a>
                                <a href='hapus.php?id=" . $row['id_supplier'] . "' class='button button-delete' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </div>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No suppliers found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
