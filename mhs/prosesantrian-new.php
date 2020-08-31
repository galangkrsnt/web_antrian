<?php
require_once('../crud/antrian-crud.php');
require_once('../crud/jadwal-crud.php');
include('../phpqrcode/qrlib.php');
error_reporting(0);
// include "phpqrcode/qrlib.php"; 

    $id_mahasiswa       = $_POST['id_mahasiswa'];

    $tgl_antrian        = $_POST['tgl_antrian'];
    
    $tgl_ambil          = date('Y-m-d');
    date_default_timezone_set('Asia/Jakarta');
    $tglantri           = $_POST['tgl_antrian'];
    $jam                = $_POST['rentangjam'];

    $cekjumlahantrian = "SELECT count(*) as jumlah FROM jadwalantrian where status_antrian = 'Pesan Antrian' and tgl_antri = '$tgl_antrian' and rentangjam = '$jam'";
    $hasil_hitung = hitungJumlahAntrian($cekjumlahantrian);
    foreach($data as $hasil_hitung){
        $jumlah = $data['jumlah'];  
    }

        // echo $jumlah."genap";
    $id_loket         = '1';
    $status_antrian   = 'Pesan Antrian';

    // print_r($id_mahasiswa);
    $hasil1 = tambahJadwalAntrian($id_mahasiswa, $id_loket, $tgl_ambil, $tgl_antrian, $status_antrian, $jam);
    if($hasil1 > 0){
        header("Location: ambil-antrian.php?status=berhasil&id_mahasiswa=".$id_mahasiswa."");
    }else{
        // jika gagal insert 
        header("Location: ambil-antrian.php?status=gagal");
        // echo "<script>alert('Mohon Maaf antrian penuh');window.location='ambil-antrian.php'</script>";
    }

    

?>