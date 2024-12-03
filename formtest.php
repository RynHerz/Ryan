<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .radio-group {
            display: flex;
            gap: 15px;
            margin-top: 5px;
        }
        .radio-group label {
            font-weight: normal;
        }
    </style>
</head>
<body>
    <?php
    // Inisialisasi variabel
    $errors = [];
    $success = false;

    // Daftar jurusan
    $jurusan = [
        "Teknik Informatika",
        "Sistem Informasi",
        "Teknik Komputer",
        "Manajemen Informatika",
        "Teknologi Informasi"
    ];

    // Cek apakah form sudah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi NIM
        if (empty($_POST["nim"])) {
            $errors["nim"] = "NIM harus diisi";
        } elseif (!preg_match("/^[0-9]{8,10}$/", $_POST["nim"])) {
            $errors["nim"] = "NIM harus berupa angka 8-10 digit";
        }

        // Validasi Nama
        if (empty($_POST["nama"])) {
            $errors["nama"] = "Nama harus diisi";
        }

        // Validasi Jurusan
        if (empty($_POST["jurusan"])) {
            $errors["jurusan"] = "Jurusan harus dipilih";
        }

        // Validasi Gender
        if (empty($_POST["gender"])) {
            $errors["gender"] = "Gender harus dipilih";
        }

        // Validasi Alamat
        if (empty($_POST["alamat"])) {
            $errors["alamat"] = "Alamat harus diisi";
        }

        // Validasi No HP
        if (empty($_POST["nohp"])) {
            $errors["nohp"] = "Nomor HP harus diisi";
        } elseif (!preg_match("/^[0-9]{10,13}$/", $_POST["nohp"])) {
            $errors["nohp"] = "Nomor HP tidak valid";
        }

        // Validasi Email
        if (empty($_POST["email"])) {
            $errors["email"] = "Email harus diisi";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Format email tidak valid";
        }

        // Jika tidak ada error, proses data
        if (empty($errors)) {
            $success = true;
        }
    }
    ?>

    <div class="container">
        <?php if ($success): ?>
            <div class="success">
                <h3>Data Mahasiswa Berhasil Disimpan!</h3>
                <p>Data yang Anda masukkan telah berhasil disimpan dalam sistem.</p>
                <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Kembali ke form pendaftaran</a></p>
            </div>
        <?php else: ?>
            <h2>Form Pendaftaran Mahasiswa</h2>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" value="<?php echo isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : ''; ?>">
                    <?php if (isset($errors['nim'])): ?>
                        <span class="error"><?php echo $errors['nim']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">
                    <?php if (isset($errors['nama'])): ?>
                        <span class="error"><?php echo $errors['nama']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <select id="jurusan" name="jurusan">
                        <option value="">Pilih Jurusan</option>
                        <?php foreach ($jurusan as $jur): ?>
                            <option value="<?php echo $jur; ?>" <?php echo (isset($_POST['jurusan']) && $_POST['jurusan'] == $jur) ? 'selected' : ''; ?>>
                                <?php echo $jur; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['jurusan'])): ?>
                        <span class="error"><?php echo $errors['jurusan']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Gender:</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="gender" value="Laki-laki" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Laki-laki') ? 'checked' : ''; ?>>
                            Laki-laki
                        </label>
                        <label>
                            <input type="radio" name="gender" value="Perempuan" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Perempuan') ? 'checked' : ''; ?>>
                            Perempuan
                        </label>
                    </div>
                    <?php if (isset($errors['gender'])): ?>
                        <span class="error"><?php echo $errors['gender']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" name="alamat" rows="3"><?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?></textarea>
                    <?php if (isset($errors['alamat'])): ?>
                        <span class="error"><?php echo $errors['alamat']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="nohp">Nomor HP:</label>
                    <input type="tel" id="nohp" name="nohp" value="<?php echo isset($_POST['nohp']) ? htmlspecialchars($_POST['nohp']) : ''; ?>">
                    <?php if (isset($errors['nohp'])): ?>
                        <span class="error"><?php echo $errors['nohp']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    <?php if (isset($errors['email'])): ?>
                        <span class="error"><?php echo $errors['email']; ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit">Simpan</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>