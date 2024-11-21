<?php

$kelas = $_GET['kelas'];

include "koneksi.php";
$qry = "DELETE FROM table_matkul WHERE kelas = '$kelas'";
$exec = mysqli_query($conn, $qry);

if($exec){
    echo " <script>alert('yeyyayy data berhasil di hapus'); window.location = 'matkul.php'</script> ";
   }else{
    echo " yahhh data gagal disimpan ";
   }