<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Validasi Server-side</title>
    <style>
        body { font-family: Arial; background: #f3f7fa; padding: 20px; }
        .box { background: white; padding: 20px; border-radius: 10px; width: 450px; margin: auto; }
        h2 { text-align: center; color: #2c3e50; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="box">
    <h2>Validasi Server-side</h2>
    <?php
    require 'validate.inc';
    $errors = array();
    validateName($errors, $_POST, 'nama');

    if ($errors) {
        echo "<h3 class='error'>Terjadi Error:</h3>";
        foreach ($errors as $field => $error) {
            echo "<p class='error'>$field : $error</p>";
        }
    } else {
        echo "<p>Semua data valid!</p>";
        foreach ($_POST as $key => $value) {
            if ($value != "")
                echo "<div><b>" . ucfirst($key) . "</b> : " . htmlspecialchars($value) . "</div>";
        }
    }
    ?>
</div>
</body>
</html>
