<form action="formData.php" method="POST">

    <label>Nama Lengkap</label>
    <input type="text" name="nama" placeholder="Masukkan nama lengkap Anda"
           value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">

    <label>Email</label>
    <input type="email" name="email" placeholder="example@gmail.com"
           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

    <label>Password</label>
    <input type="password" name="password" placeholder="Minimal 6 karakter"
           value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">

    <label>Alamat Lengkap</label>
    <textarea name="alamat" placeholder="Masukkan alamat Anda" rows="3"><?php
        echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?></textarea>

    <label>Provinsi</label>
    <select name="provinsi">
        <option value="">-- Pilih Provinsi --</option>
        <option <?php if(isset($_POST['provinsi']) && $_POST['provinsi']=="Jawa Barat") echo "selected"; ?>>Jawa Barat</option>
        <option <?php if(isset($_POST['provinsi']) && $_POST['provinsi']=="Jawa Tengah") echo "selected"; ?>>Jawa Tengah</option>
        <option <?php if(isset($_POST['provinsi']) && $_POST['provinsi']=="Jawa Timur") echo "selected"; ?>>Jawa Timur</option>
        <option <?php if(isset($_POST['provinsi']) && $_POST['provinsi']=="DKI Jakarta") echo "selected"; ?>>DKI Jakarta</option>
    </select>

    <input type="hidden" name="negara" value="Indonesia">

    <label>Jenis Kelamin</label>
    <div class="radio-group">
        <input type="radio" name="gender" value="Laki-laki"
            <?php if(isset($_POST['gender']) && $_POST['gender']=="Laki-laki") echo "checked"; ?>> Laki-laki
        <input type="radio" name="gender" value="Perempuan"
            <?php if(isset($_POST['gender']) && $_POST['gender']=="Perempuan") echo "checked"; ?>> Perempuan
    </div>

    <label class="checkbox">
        <input type="checkbox" name="vegetarian" value="Ya"
            <?php if(isset($_POST['vegetarian'])) echo "checked"; ?>>
        Vegetarian?
    </label>

    <div class="buttons">
        <input type="submit" value="Kirim Data">
        <input type="reset" value="Reset">
    </div>
</form>
