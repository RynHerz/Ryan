<?php

$conn = mysqli_connect('localhost', 'root', '', 'ba231_db');
$query = "SELECT * FROM dosen";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pencarian Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <nav class="navbar navbar-expand-lg p-3 mb-2 bg-secondary text-white fixed-top sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="latianform.php">Input Form</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dosen.php">Dosen</a>
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
<body class="bg-light">
    <div class="container py-4">
        <h2 class="mb-4">Pencarian Data Dosen</h2>
        <hr>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <label for="entriesSelect" class="me-2">Show</label>
                    <select id="entriesSelect" class="form-select form-select-sm w-auto">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="ms-2">entries</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Search</span>
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari data dosen">
                </div>
            </div>
        </div>

        <table class="table table-hover table-bordered">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>E-Mail</th>
                    <th>Jurusan</th>
                    <th>Almamater</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) { 
                ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['telepon']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['jurusan']; ?></td>
                    <td><?php echo $row['almamater']; ?></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="editdosen.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="deletedosen.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    table = document.getElementsByTagName('table')[0];
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) { 
        td = tr[i].getElementsByTagName('td');
        for (let j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = '';
                    break;
                } else {
                    tr[i].style.display = 'none';
                }
            }
        }
    }
});
</script>
