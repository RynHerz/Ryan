<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama_matkul = $_POST['nama_matkul'];
    $sks = $_POST['sks'];
    $kelas = $_POST['kelas'];


   //membuat koneksi
   include "koneksi.php";

   //buat query insert
   $qry =  " INSERT INTO table_matkul VALUES
   ('$kelas','$nama_matkul','$sks') ";

   //eksekusi query
   $exec = mysqli_query($conn , $qry);

   //cek apakah berhasil
   if($exec){
    echo " <script>alert('yeyyayy data berhasil di simpan'); window.location = 'matkul.php';</script> ";
   }else{
    echo " yahhh data gagal disimpan ";
   }
}