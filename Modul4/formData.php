<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Self-Submission Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2> Form Data Pribadi (Self-Submission) </h2>
    <?php
    $errors = array();

    if (isset($_POST['nama'])) {
        require 'validate.inc';

        // Panggil semua fungsi validasi
        validateName($errors, $_POST, 'nama');
        validateEmail($errors, $_POST, 'email');
        validatePassword($errors, $_POST, 'password');

        if ($errors) {
            echo '<h3 style="color:red;">Terjadi Error:</h3>';
            foreach ($errors as $field => $error) {
                echo "<p style='color:red;'>$field : $error</p>";
            }
            include 'form.inc';
        } else {
            include 'form.inc';
            echo '<p style="color:green;">Form submitted successfully with no errors!</p>';
            echo '<hr>';
            echo '<h3>Data yang Dikirim:</h3>';
            foreach ($_POST as $key => $value) {
                if ($value != "")
                    echo "<p><b>" . ucfirst($key) . ":</b> " . htmlspecialchars($value) . "</p>";
            }
        }
    } else {
        include 'form.inc';
    }
    ?>
</div>
</body>
</html>
