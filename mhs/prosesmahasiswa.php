<?php
require_once('../crud/mhs-crud.php');

// $username = $_POST['username'];
$password = $_POST['password'];
$nim = $_POST['nim'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$email_mahasiswa = $_POST['email_mahasiswa'];

$kondisi = $nim;
$cek = cariMahasiswa($kondisi);
if($cek){
    header("Location: ../signup.php?gagal-2");
}else{
    $hasil = tambahMhs($password, $nim, $nama_mahasiswa, $email_mahasiswa);
    if($hasil > 0){
        header("Location: ../signup.php?berhasil");
    }else{
        header("Location: ../signup.php?gagal");
    }
}
?>