<?php
require_once("../crud/mhs-crud.php");
session_start();
$nim = $_SESSION['nim']; 
// $username = $_SESSION['username'];
  $data = array(); //deklarasi var array
  $data = cariUserMhs($nim); //mencari user (nama)
  $_SESSION['nim'] = $data['nim'];
  $_SESSION['id_mahasiswa'] = $data['id_mahasiswa'];
  $_SESSION['nama_mahasiswa'] = $data['nama_mahasiswa'];
  $nim = $_SESSION['nim'];
  $id_mahasiswa = $_SESSION['id_mahasiswa'];
  $nama_mahasiswa = $_SESSION['nama_mahasiswa'];
if(empty($nim)){
    echo "<script>alert('Anda Belum Login');window.location='../index.php'</script>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- custon css untuk index -->
    <link rel="stylesheet" href="../assets/css/cssone.css">

    <title>Halaman Beranda</title>
  </head>
  <body class="d-flex flex-column">
    <div class="header text-center">

        <H2 style="color: white"><span><img src="../assets/images/logo-header.png" alt="logo" ></span></H2>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav navbar-center">
                <li class="nav-item <?php echo $index; ?>">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item <?php echo $pengumuman; ?>">
                    <a class="nav-link" href="pengumuman.php">Pengumuman</a>
                </li>
                <li class="nav-item <?php echo $ambilantrian; ?>">
                    <a class="nav-link" href="ambil-antrian.php">Ambil Antrian</a>
                </li>
                <!-- <li class="nav-item <?php echo $informasiantri; ?>">
                    <a class="nav-link" href="informasi-antrian.php">Informasi Antrian</a>
                </li> -->
                <li class="nav-item <?php echo $antriansaya; ?>">
                    <a class="nav-link" href="antrian-saya.php">Antrian Saya</a>
                </li>
                <li class="nav-item <?php echo $profile; ?>">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-content">
    

