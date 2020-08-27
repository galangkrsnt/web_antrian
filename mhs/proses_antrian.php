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
    // $jam_skrg   = date('H:i');
    // $rentangjam = 0;

    

    // loket 1
    $sql_jml1 = "SELECT count(*) as jumlah FROM jadwalantrian
                 where id_Loket = 1 and tgl_antri like '$tgl_antri' and rentangjam = $jam";
    $sql_sts1 = "SELECT max(id_jadwalAntrian) as id_jadwalAntrian, status_antrian from jadwalantrian where id_loket = 1 and tgl_antri like '$tgl_antri' and rentangjam = $jam and status_antrian = 'Pesan Antrian'";
    $jml_loket1 = hitungJumlahAntrian($sql_jml1);
    $data_max1  = bacaJadwalAntrianAkhir($sql_sts1);
    foreach($jml_loket1 as $jmlloket1){
        $jumlah_antrian1 = $jmlloket1['jumlah'];  
    }

    foreach($data_max1 as $dataantriansaya1){
        $id_jadwalAntrian1 = $dataantriansaya1['id_jadwalAntrian'];
        $status_antrian1 = $dataantriansaya1['status_antrian'];
    }

    // loket 2
    $sql_jml2 = "SELECT count(*) as jumlah FROM jadwalantrian
                 where id_Loket = 2 and tgl_antri like '$tgl_antri' and rentangjam = $jam";
    $sql_sts2 = "SELECT max(id_jadwalAntrian) as id_jadwalAntrian, status_antrian from jadwalantrian where id_loket = 2 and tgl_antri like '$tgl_antri' and rentangjam = $jam";
    $jml_loket2 = hitungJumlahAntrian($sql_jml2);
    $data_max2  = bacaJadwalAntrianAkhir($sql_sts2);
    foreach($data_max2 as $dataantriansaya2){
        $id_jadwalAntrian2 = $dataantriansaya2['id_jadwalAntrian'];
        $status_antrian2 = $dataantriansaya2['status_antrian'];
    }
    foreach($jml_loket2 as $jmlloket2){
        $jumlah_antrian2 = $jmlloket2['jumlah'];  
    }

    // proses insert ke antrian dan jadwal antrian
    if(($jumlah_antrian1 < 12) AND ($status_antrian1 == 'Pesan Antrian')){
        $id_loket         = '1';
        $status_antrian   = 'Pesan Antrian';
        $hasil1 = tambahJadwalAntrian($id_mahasiswa, $id_loket, $tgl_ambil, $tgl_antrian, $status_antrian, $jam);
        if($hasil1 > 0){
            header("Location: ambil-antrian.php?status=berhasil&id_mahasiswa=".$id_mahasiswa."");
        }else{
            // jika gagal insert 
            header("Location: ambil-antrian.php?status=gagal1");
            // echo "<script>alert('Mohon Maaf antrian penuh');window.location='ambil-antrian.php'</script>";
        }

    }elseif(($jumlah_antrian2 < 12) AND ($status_antrian2 == 'Pesan Antrian')){
        $id_loket         = '2';
        $status_antrian   = 'Pesan Antrian';
        $hasil1 = tambahJadwalAntrian($id_mahasiswa, $id_loket, $tgl_ambil, $tgl_antrian, $status_antrian, $jam);
        if($hasil1 > 0){
            header("Location: ambil-antrian.php?status=berhasil&id_mahasiswa=".$id_mahasiswa."");
        }else{
            header("Location: ambil-antrian.php?status=gagal2");
        }
    }else{

        echo "<script>alert('Mohon Maaf antrian penuh');window.location='ambil-antrian.php'</script>";
    }

?>