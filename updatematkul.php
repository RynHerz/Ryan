<?php

$nama_matkul= $_POST['nama_matkul'];
$sks = $_POST['sks'];
$kelas = $_POST['kelas'];

include "koneksi.php";

$qry = "UPDATE table_matkul SET
        kelas = '$kelas',
        sks = '$sks'
        WHERE nama_matkul = '$nama_matkul'
        ";

$exec = mysqli_query($conn, $qry);

if($exec){
    echo "<script>alert('yeyyayy data berhasil di simpan'); window.location = 'matkul.php';</script>";
}else{
    echo "Data gagal di simpan";
}