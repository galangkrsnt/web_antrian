<?php
require_once("../crud/admin-crud.php");
require_once("../crud/jadwal-crud.php");
session_start();
$nip = $_SESSION['nip']; 

  $data = array(); //deklarasi var array
  $data = cariUserAdmin($nip); //mencari user (nama)

  $_SESSION['nip'] = $data['nip'];
  $_SESSION['nama_petugas'] = $data['nama_petugas'];

  $nip = $_SESSION['nip'];
  $nama_petugas = $_SESSION['nama_petugas'];
if(empty($nip)){
    echo "<script>alert('Anda Belum Login');window.location='../index.php'</script>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta http-equiv="refresh" content="1"> -->

    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- custon css untuk index -->
    <link rel="stylesheet" href="../assets/css/cssone.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .btn-menu {
    background-color: white;
    border: none;
    color: DodgerBlue;
    width: 120px;
    padding: 12px 16px;
    font-size: 70px;
    cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn:hover {
    background-color: RoyalBlue;
    }
    </style>
    
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

                <li class="nav-item <?php echo $jadwalantri; ?>">
                    <a class="nav-link" href="jadwal-antrian.php">Jadwal Antrian</a>
                </li>
                <li class="nav-item <?php echo $jadwalantri; ?>">
                    <a class="nav-link" href="scan-antrian.php">Scan Antrian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="keluar.php">Logout</a>
                </li>
                <!-- <li class="nav-item <?php echo $informasiantri; ?>">
                    <a class="nav-link" href="informasi-antrian.php">Informasi Antrian</a>
                </li> -->
                <!-- <li class="nav-item <?php echo $antriansaya; ?>">
                    <a class="nav-link" href="antrian-saya.php">Antrian Saya</a>
                </li>
                <li class="nav-item <?php echo $profile; ?>">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li> -->
            </ul>
        </div>
    </nav>
    <div id="page-content">
    

