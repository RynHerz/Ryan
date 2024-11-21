<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Biodata</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <nav class="navbar navbar-expand-lg p-3 mb-2 bg-secondary text-white fixed-top sticky-top" >
    <div class="container-fluid">
    <a class="navbar-brand" href="latianform.php">Input Form</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="mahasiswa.php" >Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dosen.php" >Dosen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="KRS.php">KRS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formatkul.php">Perwalian</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kalender.php">Kalender Akademik Semester Ganjil 2024/2025</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
</head>

<body class="bg-light text-dark">
<div class="container p-5 my-5 border border-dark bg-white text-dark">
            <u><h3 class= "text-center">Kartu Rencana Studi</h3></u>
            <hr>
            <table class="table">
        <tr>
            <th>Nama Matkul</th>
            <th>SKS</th>
            <th>Kelas</th>
            <th class="text-center">Act</th>
        </tr>
        <?php 
            include "koneksi.php";
            $qry = "SELECT * FROM table_matkul";
            $exec = mysqli_query($conn, $qry);

            while($data = mysqli_fetch_assoc($exec)){
        ?>
        <tr>
            <td><?= $data['nama_matkul'] ?></td>
            <td><?= $data['sks'] ?></td>
            <td><?= $data['kelas'] ?></td>
            <td class="text-center">
               <a href="editmatkul.php?kelas=<?= $data['kelas'] ?>"><button class="btn btn-warning">Edit</button></a>
               
               <a href="deletematkul.php?kelas=<?= $data['kelas'] ?>"><button class="btn btn-danger">Delete</button></a>
            </td>
          </tr>
        <?php } ?>
    </table>
    </div>
</body>

</html>