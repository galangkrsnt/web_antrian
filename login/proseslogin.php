<?php
  session_start();

  require_once("../crud/mhs-crud.php");
  require_once("../crud/admin-crud.php");
  
  $nim = $_POST['nim'];
  $nip = $nim;
  $password = $_POST['password'];
  // $kode_masuk_ukm = $username;
  
  if(otentikMhs($nim, $password)){
    //set variabel sesi
    $_SESSION['nim'] = $nim;
    $dataMhs = array(); //deklarasi var array
    $dataMhs = cariUserMhs($nim); //mencari user (nama)
    $_SESSION['nim'] = $dataMhs['nim'];
    $_SESSION['nama_mahasiswa'] = $dataMhs['nama_mahasiswa'];
    $mhs = $_SESSION['nim'];
    if (!empty($mhs)) {
      header("Location: ../mhs/index.php");
    }else{
      echo "<script>alert('Username atau Password anda tidak terdaftar di sistem kami!');window.location='../login.php'</script>";
    }
    
  }elseif(otentikAdmin($nip, $password)){
    //set variabel sesi
    $_SESSION['nip'] = $nip;
    $dataAdmin = array(); //deklarasi var array
    $dataAdmin = cariUserAdmin($nip); //mencari user (nama)
    $_SESSION['nip'] = $dataAdmin['nip'];
    $_SESSION['nama_petugas'] = $dataAdmin['nama_petugas'];
    $mhs = $_SESSION['nip'];
    if (!empty($mhs)) {
      header("Location: ../admin/index.php");
    }else{
      echo "<script>alert('Username atau Password anda tidak terdaftar di sistem kami!');window.location='login.php'</script>";
    }
    
  }
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
  else{
    echo "<script>alert('Akun Anda Tidak Terdaftar Dalam Sistem.');window.location='../login.php'</script>";
  }

?>