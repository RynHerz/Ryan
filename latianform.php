<!DOCTYPE html>
<html lang="en">
<head>
    <title>Latian Form</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <nav class="navbar navbar-expand-lg p-3 mb-2 bg-secondary text-white fixed-top sticky-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">BA231</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dosen.php" >Dosen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="KRS.php">KRS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kalender.php">Kalender Akademik Semester Ganjil 2024/2025</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</head>

<body>
    <div class="container-fluid">
        <div class="container p-5 my-5 bg-dark text-white">
            <h2>Selamat datang</h2>
        </div>
        <div class="container p-5 my-5 border border-dark">
            <h2>Input Mahasiswa</h2>
            <form action="proses.php" method="POST">
                <div class="mb-3 mt-3">
                    <label for="nim">Nim :</label>
                    <input type="text" class="form-control" placeholder="Input Nim" name="nim" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="nama_mhs">Nama :</label>
                    <input type="text" class="form-control" placeholder="Input Nama" name="nama_mhs" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="kode_jurusan">Kode Jurusan :</label>
                    <select name="kode_jurusan" class="form-select">
                        <option value="J01">Sistem Komputer</option>
                        <option value="J02">Sistem Informasi</option>
                        <option value="J03">Teknologi Informasi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gender">Gender :</label><br>
                    <input class="form-check-input" type="radio" name="gender" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki - Laki
                    </label>
                    <input class="form-check-input" type="radio" name="gender" value="0">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Perempuan
                    </label>
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat :</label>
                    <input type="text" class="form-control" placeholder="Input Alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp">No HP :</label>
                    <input type="text" class="form-control" placeholder="Input No HP" name="no_hp" required>
                </div>
                <div class="mb-3">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" placeholder="Input Email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</body>

</html>