<?php
require_once('../crud/antrian-crud.php');

$id_mahasiswa       = $_POST['id_mahasiswa'];
$id_loket           = '1';
$id_jadwalAntrian   = $_POST['id_jadwalAntrian'];
$tgl_antrian        = $_POST['tgl_antrian'];
$status_antrian     = 'Menunggu';
// KA = 3
// $jur_mahasiswa = null;
// $notelp_mahasiswa = null;
// $level_id = null;

$hasil = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antrian, $status_antrian);
if($hasil > 0){
    header("Location: ../antrian-saya.php?berhasil");
}else{
    header("Location: ../signup.php?gagal");
}
?>