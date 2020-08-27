<?php
require_once('../crud/mhs-crud.php');

// $username = $_POST['username'];
$password = $_POST['password'];
$nim = $_POST['nim'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$email_mahasiswa = $_POST['email_mahasiswa'];

// KA = 3
// $jur_mahasiswa = null;
// $notelp_mahasiswa = null;
// $level_id = null;

$hasil = tambahMhs($password, $nim, $nama_mahasiswa, $email_mahasiswa);
if($hasil > 0){
    header("Location: ../signup.php?berhasil");
}else{
    header("Location: ../signup.php?gagal");
}
?>