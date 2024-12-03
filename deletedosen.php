<?php

$id = $_GET['id'];

include "koneksi.php";
$qry = "DELETE FROM dosen WHERE id = '$id'";
$exec = mysqli_query($conn, $qry);

if($exec){
    echo " <script>alert('yeyyayy data berhasil di hapus'); window.location = 'dosen.php'</script> ";
   }else{
    echo " yahhh data gagal disimpan ";
   }