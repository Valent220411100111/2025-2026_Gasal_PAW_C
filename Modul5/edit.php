<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM supplier WHERE id_supplier = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$nama = $row['nama'];
$telp = $row['telp'];
$alamat = $row['alamat'];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errors['nama'] = "Nama tidak boleh kosong dan hanya boleh berisi huruf.";
    }
    if (empty($telp) || !preg_match("/^[0-9]+$/", $telp)) {
        $errors['telp'] = "Telepon tidak boleh kosong dan hanya boleh berisi angka.";
    }
    if (empty($alamat) || !preg_match("/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d\s.,#-]+$/", $alamat)) {
        $errors['alamat'] = "Alamat harus berisi setidaknya satu huruf dan satu angka.";
    }

    if (empty($errors)) {
        $sql = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id_supplier=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
    <style>
        .error { color: red; }
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
        label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }
        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            margin-top: 10px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .cancel-button {
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #f44336;
            padding: 10px 15px;
            border-radius: 4px;
        }
        .cancel-button:hover {
            background-color: #e53935;
        }
    </style>
    <script>
        function validateForm() {
            let nama = document.forms["supplierForm"]["nama"].value.trim();
            let telp = document.forms["supplierForm"]["telp"].value.trim();
            let alamat = document.forms["supplierForm"]["alamat"].value.trim();
            let errors = {};

            if (!/^[a-zA-Z\s]+$/.test(nama)) {
                errors.nama = "Nama hanya boleh berisi huruf.";
            }
            if (!/^[0-9]+$/.test(telp)) {
                errors.telp = "Telepon hanya boleh berisi angka.";
            }
            // Updated regex to validate address
            if (!/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d\s.,#-]+$/.test(alamat)) {
                errors.alamat = "Alamat harus berisi setidaknya satu huruf dan satu angka.";
            }

            for (let key in errors) {
                document.getElementById("error_" + key).innerText = errors[key];
            }
            return Object.keys(errors).length === 0;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Edit Supplier</h2>
        <form name="supplierForm" action="" method="POST" onsubmit="return validateForm()">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
            <span class="error" id="error_nama"><?php echo $errors['nama'] ?? ''; ?></span>

            <label>Telepon:</label>
            <input type="text" name="telp" value="<?php echo htmlspecialchars($telp); ?>" required>
            <span class="error" id="error_telp"><?php echo $errors['telp'] ?? ''; ?></span>

            <label>Alamat:</label>
            <textarea name="alamat" required><?php echo htmlspecialchars($alamat); ?></textarea>
            <span class="error" id="error_alamat"><?php echo $errors['alamat'] ?? ''; ?></span>

            <button type="submit">Update</button>
            <a href="index.php" class="cancel-button">Batal</a>
        </form>
    </div>
</body>
</html>
