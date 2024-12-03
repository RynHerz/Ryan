<?php

$nim = $_GET['nim'];

include "koneksi.php";
$qry = "DELETE FROM table_mahasiswa WHERE nim = '$nim'";
$exec = mysqli_query($conn, $qry);

if($exec){
    echo " <script>alert('yeyyayy data berhasil di hapus'); window.location = 'mahasiswa.php';</script> ";
   }else{
    echo " yahhh data gagal disimpan ";
   }