<?php

  // session_start();
  // include "./config/koneksi.php";

  // if (isset($_POST['login'])) {

  //   global $errors;

  //   $username = $_POST['username'];
  //   $password = md5($_POST['password']);
  //   $level = $_POST['level'];

  //   if (empty($username)) {
  //     array_push($errors, "Username is required");
  //   }
  //   if (empty($password)) {
  //     array_push($errors, "Password is required");
  //   }

  //   if (count($errors) == 0) {
  //     $query = "SELECT * FROM mahasiswa WHERE username='$username' AND password='$password' LIMIT 1";
  //     $results = mysqli_query($koneksi, $query);
  
  //     if (mysqli_num_rows($results) == 1) {
  //       // check if user is admin or user
  //       $logged_in_user = mysqli_fetch_assoc($results);

  //       if ($logged_in_user['level'] == 'admin') {
  //         $_SESSION['user'] = $logged_in_user;
  //         $_SESSION['success']  = "You are now logged in";
  //         header('location: admin/dashboard.php');		  
  //       }else{
  //         $_SESSION['user'] = $logged_in_user;
  //         $_SESSION['success']  = "You are now logged in";
  //         header('location: mhs/index.php');
  //       }
  //     }else {
  //       array_push($errors, "Wrong username/password combination");
  //     }
  //   }
  // }

  session_start();

  require_once("crud/mhs-crud.php");
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  // $kode_masuk_ukm = $username;
  
  if(otentikMhs($username, $password)){
    //set variabel sesi
    $_SESSION['username'] = $username;
    $dataMhs = array(); //deklarasi var array
    $dataMhs = cariUserMhs($username); //mencari user (nama)
    $_SESSION['username']       = $dataMhs['username'];
    $_SESSION['nama_mahasiswa'] = $dataMhs['nama_mahasiswa'];
    $_SESSION['id_mahasiswa'] = $dataMhs['id_mahasiswa'];
    $_SESSION['nim'] = $dataMhs['nim'];
    // print_r($_SESSION['nim']);
    $mhs = $_SESSION['username'];
    if (!empty($mhs)) {
      header("Location: mhs/index.php");
    }else{
      echo "<script>alert('Username atau Password anda tidak terdaftar di sistem kami!');window.location='login.php'</script>";
    }
    
  }else{
    echo "<script>alert('Akun Anda Tidak Terdaftar Dalam Sistem.');window.location='index.php'</script>";
    // else if(otentikKaryawan($username, $password)){
  //   //set variabel sesi
  //   $_SESSION['username'] = $username;
  //   $dataKaryawan = array(); //deklarasi var array
  //   $dataKaryawan = cariKaryawanDariUsername($username); //mencari user (nama)
  //   $_SESSION['username'] = $dataKaryawan['username'];
  //   $_SESSION['id_karyawan'] = $dataKaryawan['id_karyawan'];
  //   $_SESSION['jabatan'] = $dataKaryawan['jabatan'];
  //   $_SESSION['nama_karyawan'] = $dataKaryawan['nama_karyawan'];
  //   if($_SESSION['jabatan'] == 'S'){
  //     header("Location: ../staf/tampilanstaf.php");
  //   }else{
  //     header("Location: ../kep_bag/tampilan_kepbag.php");
  //   }
    
    
  // }
  }

?>