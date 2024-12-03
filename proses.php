<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $kode_jurusan = $_POST['kode_jurusan'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

   //membuat koneksi
   include "koneksi.php";

   //buat query insert
   $qry =  " INSERT INTO table_mahasiswa VALUES
   ('$nim','$nama_mhs','$kode_jurusan','$gender','$alamat','$no_hp','$email') ";

   //eksekusi query
   $exec = mysqli_query($conn , $qry);

   //cek apakah berhasil
   if($exec){
    echo " <script>alert('yeyyayy data berhasil di simpan'); window.location = 'latianform.php';</script> ";
   }else{
    echo " yahhh data gagal disimpan ";
   }
}