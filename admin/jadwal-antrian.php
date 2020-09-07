<?php
$jadwalantri = "active";
include('header.php');
require_once("../crud/mhs-crud.php");

date_default_timezone_set('Asia/Jakarta');

$tgl_skrg = date('Y-m-d');
$jam_skrg = date('H:i');

$cek ="SELECT * from jadwalantrian where status_antrian = 'Pesan Antrian'";
$data_cek = bacaJadwal($cek);
foreach($data_cek as $datacek){
    $id_jadwalAntrian = $datacek['id_jadwalAntrian'];
    $tgl_antri = $datacek['tgl_antri'];
    $rentang = $datacek['rentangjam'];
}
$id_jadwalAntrian = $id_jadwalAntrian;
$tgl_antri = $tgl_antri;
$rentang = $rentang;
if(($tgl_antri == $tgl_skrg) AND ($rentang == 1)){
    
    if($jam_skrg > '07:55'){
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
    }
}elseif(($tgl_antri == $tgl_skrg) AND ($rentang == 2)){
    if($jam_skrg > '08:55'){
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
    }
}elseif(($tgl_antri == $tgl_skrg) AND ($rentang == 3)){
    if($jam_skrg > '09:55'){
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
    }
}elseif(($tgl_antri == $tgl_skrg) AND ($rentang == '4')){
    // print_r($jam_skrg);
    if($jam_skrg > '10:55'){
        // print_r($rentang);
        // echo "hai";
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
    }
}elseif(($tgl_antri == $tgl_skrg) AND ($rentang == 5)){
    if($jam_skrg > '12:55'){
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
    }
}elseif(($tgl_antri == $tgl_skrg) AND ($rentang == 6)){
    if($jam_skrg > '13:55'){
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
    }
}elseif(($tgl_antri == $tgl_skrg) AND ($rentang == 7)){
    if($jam_skrg > '14:55'){
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
    }
}else{
 
}
?>
<div class="container">
<form class="form-horizontal" action="jadwal-antrian.php" method="POST">
    <div class="form-group">
        <label for="tanggal" class="col-sm-3 control-label">Jadwal Antrian</label>
        <div class="col-sm-12">
            <input type="date" id="tanggal" name="tanggal" placeholder="Pilih Tanggal" value="<?php echo $_POST['tanggal']; ?>" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Pilih</button>
</form>
<?php


if(isset($_POST['tanggal'])){
    $tanggal = $_POST['tanggal'];
     // hitung jumlah antrian pertanggal terpilih
    $sql2 ="SELECT count(*) AS jumlah FROM jadwalantrian where tgl_antri like '$tanggal'";
    $data2 = hitungJumlahAntrian($sql2);
    foreach($data2 as $jadwal){
        $jumlah_antrian = $jadwal['jumlah'];
        
    }
?>
<table class="table table-bordered table-light">
    <thead class="thead-dark">
        <tr>
        <th scope="col" colspan="4" class="text-center">Total Antrian : <?php echo $jumlah_antrian;?></th>
        </tr>
    </thead>
</table>
<table class="table table-bordered table-light">
    <thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center" style="width:10%">No</th>
            <th scope="col" class="text-center" style="width:30%">Nama</th>
            <th scope="col" class="text-center" style="width:20%">Tanggal Antrian</th>
            <th scope="col" class="text-center" style="width:15%">Rentang Jam</th>
            <th scope="col" class="text-center" style="width:25%">Status</th>
        </tr>
    </thead>
    <tbody>
<?php    
    
    $sql ="SELECT * FROM jadwalantrian where tgl_antri like '$tanggal'";
    $data = bacaJadwal($sql);
    $i = 1;
    if($data){
    foreach($data as $jadwal){
        $id_jadwalAntrian = $jadwal['id_jadwalAntrian'];
        $id_mahasiswa   = $jadwal['id_mahasiswa'];
        $id_loket       = $jadwal['id_loket'];
        $tgl_ambil      = $jadwal['tgl_ambil'];
        $tgl_antri      = $jadwal['tgl_antri'];
        $status_antrian = $jadwal['status_antrian'];
        $rentangjam    = $jadwal['rentangjam'];
        
    
    $kondisi = "$id_mahasiswa";
    $data2 = cariMahasiswa($kondisi);
    foreach($data2 as $mhs){
        $nama_mhs = $mhs['nama_mahasiswa'];
    }
    if($rentangjam == 1){
        $rentangjam = '08:00 - 09:00';
    }elseif($rentangjam == 2){
        $rentangjam = '09:00 - 10:00';
    }elseif($rentangjam == 3){
        $rentangjam = '11:00 - 12:00';
    }elseif($rentangjam == 4){
        $rentangjam = '12:00 - 13:00';
    }elseif($rentangjam == 5){
        $rentangjam = '13:00 - 14:00';
    }elseif($rentangjam == 6){
        $rentangjam = '14:00 - 1500';
    }elseif($rentangjam == 7){
        $rentangjam = '15:00 - 16:00';
    }
?>
        <tr>
            <th scope="row" class="text-center"><?= $i ?></th>
            <td><?= $nama_mhs ?></td>
            <td class="text-center"><?= $tgl_antri ?></td>
            <td class="text-center"><?= $rentangjam ?></td>
            <td class="text-center"><?= $status_antrian ?></td>
        </tr>
    <?php $i++; }
    }else{ ?>
        <tr>
        <td colspan="4" class="text-center">Tidak Ada Antrian</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php }else{ ?>

<?php } ?>
</div>


<?php
include('footer.php');
?>