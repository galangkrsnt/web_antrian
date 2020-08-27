<?php
require_once('../crud/antrian-crud.php');
require_once('../crud/jadwal-crud.php');
include('../phpqrcode/qrlib.php');
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
    $sql_sts1 = "SELECT max(id_jadwalAntrian) as id_jadwalAntrian, status_antrian from jadwalantrian where id_loket = 1 and tgl_antri like '$tgl_antri' and rentangjam = $jam";
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
    if(($jumlah_antrian1 < 12) AND ($status_antrian1 != 'Menunggu')){
        $id_loket = '1';
        $status_antrian     = 'Menunggu';
        $hasil1 = tambahJadwalAntrian($id_mahasiswa, $id_loket, $tgl_ambil, $tgl_antrian, $status_antrian, $jam);
        if($hasil1 > 0){
            $sqla ="SELECT MAX(id_jadwalAntrian) AS id_jadwalAntrian FROM jadwalantrian an
            where tgl_antri like '".$tgl_antrian."' and id_loket = 1 and rentangjam = $jam";
            $data_max_antrian1 = bacaJadwalAntrianAkhir($sqla);
            foreach($data_max_antrian1 as $antrian1){
                $id_jadwalAntrian = $antrian1['id_jadwalAntrian'];
                $rentangjam       = $antrian1['rentangjam'];
            }
            $idjadwal = $id_jadwalAntrian;
            $sqlb ="SELECT MAX(no_antrian) AS no_antrian FROM antrian an
            where tgl_antrian like '".$tgl_antrian."' and id_loket = 1";
            $data_max_antrian = bacaMaxAntrian($sqlb);
            foreach($data_max_antrian as $antrian2){
                $no_antrian = $antrian2['no_antrian'] + 1;
                // $id_jadwalAntrian = $antrian['id_jadwalAntrian'];
            }
            $hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $idjadwal, $tgl_antrian, $status_antrian, $no_antrian);
            if($hasil2 > 0){
                header("Location: ambil-antrian.php?status=berhasil&id_mahasiswa=".$id_mahasiswa."");
            }else{
                header("Location: ambil-antrian.php?status=gagal1".$id_mahasiswa.",".$id_loket.",".$idjadwal.",".$tgl_antrian.",".$status_antrian.",".$no_antrian."");
            }
        }
    }elseif(($jumlah_antrian2 < 12) AND ($status_antrian2 != 'Menunggu')){
        $id_loket = '2';
        $status_antrian     = 'Menunggu';
        $hasil1 = tambahJadwalAntrian($id_mahasiswa, $id_loket, $tgl_ambil, $tgl_antrian, $status_antrian, $rentangjam);
        if($hasil1 > 0){
            // SELECT MAX(no_antrian) AS no_antrian FROM antrian an INNER JOIN jadwalantrian ja on ja.id_jadwalAntrian = an.id_antrian where ja.tgl_antri like '2020-08-10' and ja.id_loket = 2 and ja.rentangjam = 1
            $sql ="SELECT MAX(no_antrian) AS no_antrian FROM antrian an
            INNER JOIN jadwalantrian ja on ja.id_jadwalAntrian = an.id_antrian 
            where ja.tgl_antrian like '".$tgl_antrian."' and ja.id_loket = 2 and ja.rentangjam = $jam";
            $hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antrian, $status_antrian, $no_antrian);
            if($hasil2 > 0){
                header("Location: ambil-antrian.php?status=berhasil&id_mahasiswa=".$id_mahasiswa."");
            }else{
                header("Location: ambil-antrian.php?status=gagal2");
            }
        }
    }





// $sql2 ="SELECT MAX(id_jadwalAntrian) AS id_jadwalAntrian FROM jadwalantrian";
// $data_max2 = bacaMaxJadwal($sql2);
// foreach($data_max2 as $jadwal){
//     $id_jadwalAntrian = $jadwal['id_jadwalAntrian'];
//     // if($id_jadwalAntrian <= 0){
//     //     $id_jadwalAntrian = $id_jadwalAntrian + 1;
//     // }else{
//     //     $id_jadwalAntrian = $jadwal['id_jadwalAntrian'];
//     // }
    
// }

// $sql ="SELECT MAX(no_antrian) AS no_antrian FROM antrian where tgl_antrian like '".$tgl_antrian."'";
// $data_max = bacaMaxAntrian($sql);
// foreach($data_max as $antrian){
//     $no_antrian = $antrian['no_antrian'] + 1;
// }

// $hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antrian, $status_antrian, $no_antrian);
// // if($hasil2 > 0){
// //     print_r('berhasil tambah');
// // }else{
// //     print_r($id_jadwalAntrian);
// // }
// if($hasil2 > 0){
//     header("Location: antrian-saya.php?status=berhasil&id_mahasiswa=".$id_mahasiswa."");

// }else{
//     header("Location: antrian-saya.php?status=gagal");
//     // print_r($no_antrian);
//     // print_r($hasil2);
// }
?>