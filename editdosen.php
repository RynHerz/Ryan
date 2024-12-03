<?php

$conn = mysqli_connect('localhost', 'root', '', 'ba231_db');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM dosen WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $dosen = mysqli_fetch_assoc($result);
    } else {
        echo "YAHH :( Data dosen tidak ada";
        exit;
    }
} else {
    echo " HUMM :( ID dosen tidak ada disini";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $almamater = $_POST['almamater'];

    $updateQuery = "UPDATE dosen SET 
        nama = '$nama', 
        alamat = '$alamat', 
        telepon = '$telepon', 
        email = '$email', 
        jurusan = '$jurusan', 
        almamater = '$almamater' 
        WHERE id = $id";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Data dosen berhasil diperbarui!'); window.location='dosen.php';</script>";
    } else {
        echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <nav class="navbar navbar-expand-lg p-3 mb-2 bg-secondary text-white fixed-top sticky-top" >
    <div class="container-fluid">
    <a class="navbar-brand" href="latianform.php">Input Form</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="mahasiswa.php">Mahasiswa</a>
          <link rel="stylesheet" href=" ">
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
    <div class="container mt-5">
        <h2>Edit Data Dosen</h2>
        <hr>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $dosen['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $dosen['alamat']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">No Telepon</label>
                <input type="text" name="telepon" id="telepon" class="form-control" value="<?php echo $dosen['telepon']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $dosen['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?php echo $dosen['jurusan']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="almamater" class="form-label">Almamater</label>
                <input type="text" name="almamater" id="almamater" class="form-control" value="<?php echo $dosen['almamater']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="dosen.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
