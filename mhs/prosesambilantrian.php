<?php
require_once('../crud/antrian-crud.php');
require_once('../crud/jadwal-crud.php');
include('../phpqrcode/qrlib.php');
// include "phpqrcode/qrlib.php"; 

$id_mahasiswa       = $_POST['id_mahasiswa'];
// $id_loket           = '1';
// $id_jadwalAntrian   = $_POST['id_jadwalAntrian'];
$tgl_antrian        = $_POST['tgl_antrian'];
$status_antrian     = 'Menunggu';
$tgl_ambil          = date('Y-m-d');
// KA = 3
// $jur_mahasiswa = null;
// $notelp_mahasiswa = null;
// $level_id = null;
// echo $tgl_ambil;
$hasil = tambahJadwalAntrian($id_mahasiswa, $id_loket, $tgl_ambil, $tgl_antrian, $status_antrian);

$sql2 ="SELECT MAX(id_jadwalAntrian) AS id_jadwalAntrian FROM jadwalantrian";
$data_max2 = bacaMaxJadwal($sql2);
foreach($data_max2 as $jadwal){
    $id_jadwalAntrian = $jadwal['id_jadwalAntrian'];
    // if($id_jadwalAntrian <= 0){
    //     $id_jadwalAntrian = $id_jadwalAntrian + 1;
    // }else{
    //     $id_jadwalAntrian = $jadwal['id_jadwalAntrian'];
    // }
    
}

$sql ="SELECT MAX(no_antrian) AS no_antrian FROM antrian where tgl_antrian like '".$tgl_antrian."'";
$data_max = bacaMaxAntrian($sql);
foreach($data_max as $antrian){
    $no_antrian = $antrian['no_antrian'] + 1;
}

$hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antrian, $status_antrian, $no_antrian);
// if($hasil2 > 0){
//     print_r('berhasil tambah');
// }else{
//     print_r($id_jadwalAntrian);
// }
if($hasil2 > 0){
    header("Location: antrian-saya.php?status=berhasil&id_mahasiswa=".$id_mahasiswa."");

}else{
    header("Location: antrian-saya.php?status=gagal");
    // print_r($no_antrian);
    // print_r($hasil2);
}
?>