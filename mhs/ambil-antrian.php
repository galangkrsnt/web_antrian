<?php
$ambilantrian = "active";
include('../phpqrcode/qrlib.php');  
include('header.php');
?>
<div class="container">
<?php 
require_once('../crud/jadwal-crud.php');
// require_once('../crud/antrian-crud.php');
$status = '';
if(isset($_GET['status'])){
    $status = $_GET['status'];
}

date_default_timezone_set('Asia/Jakarta');
$cid_jadwalAntrian = '';
$cstatus_antrian = '';
$crentangjam = '';
$ctgl_antri= '';
// echo "<script>
// setTimeout(function () {
//     window.location.reload(1);
// }, 10000)</script>";
// echo "<script>window.location.reload(5000)</script>";
$sql = "SELECT * FROM jadwalantrian where id_mahasiswa = '".$id_mahasiswa."' order by id_jadwalAntrian desc limit 1";
$ceklastdata = bacaMaxJadwal($sql);
if($ceklastdata != null){
    foreach($ceklastdata as $datacek){
        $cid_jadwalAntrian = $datacek['id_jadwalAntrian'];
        $cstatus_antrian = $datacek['status_antrian'];
        $crentangjam = $datacek['rentangjam'];
        $ctgl_antri= $datacek['tgl_antri'];
    }
}

$jam_skrg          = date('H:i');
$tgl_skrg          = date('Y-m-d');
$update_status     = '';
// echo $jam_skrg;
if($crentangjam == 1){
    if(($jam_skrg > '07:55') AND ($tgl_skrg == $ctgl_antri) OR ($tgl_skrg > $ctgl_antri)){
        // $rentangjam = '08:00 - 09:00';
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($cid_jadwalAntrian, $ustatus_antrian);
        $update_status = 'Batal';
    }
    $update_status = $update_status;
}elseif($crentangjam == 2){
    if(($jam_skrg > '08:55') AND ($tgl_skrg == $ctgl_antri) OR ($tgl_skrg > $ctgl_antri)){
        // $rentangjam = '08:00 - 09:00';
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($cid_jadwalAntrian, $ustatus_antrian);
        $update_status = 'Batal';
    }
    $update_status = $update_status;
}elseif($crentangjam == 3){
    if(($jam_skrg > '09:55') AND ($tgl_skrg == $ctgl_antri) OR ($tgl_skrg > $ctgl_antri)){
        // $rentangjam = '08:00 - 09:00';
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($cid_jadwalAntrian, $ustatus_antrian);
        $update_status = 'Batal';
    }
    $update_status = $update_status;
}elseif($crentangjam == 4){
    if(($jam_skrg > '10:55') AND ($tgl_skrg == $ctgl_antri) OR ($tgl_skrg > $ctgl_antri)){
        // $rentangjam = '08:00 - 09:00';
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($cid_jadwalAntrian, $ustatus_antrian);
        $update_status = 'Batal';
    }
    $update_status = $update_status;
}elseif($crentangjam == 5) {
    if(($jam_skrg > '12:55') AND ($tgl_skrg == $ctgl_antri) OR ($tgl_skrg > $ctgl_antri)){
        // $rentangjam = '08:00 - 09:00';
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($cid_jadwalAntrian, $ustatus_antrian);
        $update_status = 'Batal';
    }
    $update_status = $update_status;
}elseif($crentangjam == 6){
    if(($jam_skrg > '13:55') AND ($tgl_skrg == $ctgl_antri) OR ($tgl_skrg > $ctgl_antri)){
        // $rentangjam = '08:00 - 09:00';
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($cid_jadwalAntrian, $ustatus_antrian);
        $update_status = 'Batal';
    }
    $update_status = $update_status;
}elseif($crentangjam == 7){
    if(($jam_skrg > '14:55')  AND ($tgl_skrg == $ctgl_antri) OR ($tgl_skrg > $ctgl_antri)){
        // $rentangjam = '08:00 - 09:00';
        $ustatus_antrian = 'Batal';
        $updatejadwal = updateStatusAntrian($cid_jadwalAntrian, $ustatus_antrian);
        $update_status = 'Batal';
    }
    $update_status = $update_status;
}


if(($status == 'berhasil') or ($cstatus_antrian=='Pesan Antrian')){
    // ambil data antrian trakhir

    $sql = "SELECT * from jadwalantrian where id_mahasiswa = '$id_mahasiswa' and status_antrian = 'Pesan Antrian' order by id_jadwalAntrian desc limit 1";
    $data_max = bacaJadwalAntrianAkhir($sql);
    // $jml_loket1 = hitungJumlahAntrian($sql_jml1);
    foreach($data_max as $dataantriansaya){
        $id_jadwalAntrian = $dataantriansaya['id_jadwalAntrian'];
        $id_mahasiswa     = $dataantriansaya['id_mahasiswa'];
        $tgl_antri        = $dataantriansaya['tgl_antri'];
        $status_antrian   = $dataantriansaya['status_antrian'];
        $rentangjam       = $dataantriansaya['rentangjam'];
        $id_loket         = $dataantriansaya['id_loket'];
    }
    
    
    $date      = date_create($tgl_antri);
    $tgl_antri = date_format($date,"d-m-Y");

    if($rentangjam == 1){
        $rentangjam = '08:00 - 09:00';
    }elseif($rentangjam == 2){
        $rentangjam = '09:00 - 10:00';
    }elseif($rentangjam == 3){
        $rentangjam = '10:00 - 11:00';
    }elseif($rentangjam == 4){
        $rentangjam = '11:00 - 12:00';
    }elseif($rentangjam == 5){
        $rentangjam = '13:00 - 14:00';
    }elseif($rentangjam == 6){
        $rentangjam = '14:00 - 1500';
    }elseif($rentangjam == 7){
        $rentangjam = '15:00 - 16:00';
    }

echo '
</br>
    <div class="row">
    <form class="form-horizontal" action="proses_konfirmasi.php" method="POST">
    <table class="table table-bordered table-light">
        <thead class="thead-dark">
            <tr>
            <th scope="col" colspan="4" class="text-center">Konfirmasi Antrian Anda</th>
            </tr>
        </thead>
    </table>
    <table class="table table-bordered table-light col-sm-12">
        <tr>
            <td>Antrian Tanggal</td>
            <td>:</td>
            <td>'.$tgl_antri.'</td>
        </tr>
        <tr>
            <td>Rentang Jam</td>
            <td>:</td>
            <td>'.$rentangjam.'</td>
        </tr>
        <tr>
            <td>Status Antrian</td>
            <td>:</td>
            <td>'.$status_antrian.'</td>
        </tr>
    </table>
        <input type="hidden" id="id_jadwalAntrian" name="id_jadwalAntrian" value="'.$id_jadwalAntrian.'" class="form-control">
        <input type="hidden" id="rentangjam" name="rentangjam" value="'.$rentangjam.'" class="form-control">
        <input type="hidden" id="rentangjam" name="rentangjam" value="'.$id_loket.'" class="form-control">
        <button type="submit" class="btn btn-primary btn-block">Konfirmasi</button>
    </form>
    </div>
';
}elseif($cstatus_antrian=='Menunggu'){
    $sql = "SELECT * from jadwalantrian where id_mahasiswa = '$id_mahasiswa' and status_antrian = 'Menunggu' order by id_jadwalAntrian desc limit 1";
    $data_max = bacaJadwalAntrianAkhir($sql);
    // $jml_loket1 = hitungJumlahAntrian($sql_jml1);
    foreach($data_max as $dataantriansaya){
        $id_jadwalAntrian = $dataantriansaya['id_jadwalAntrian'];
        $id_mahasiswa     = $dataantriansaya['id_mahasiswa'];
        $tgl_antri        = $dataantriansaya['tgl_antri'];
        $status_antrian   = $dataantriansaya['status_antrian'];
        $rentangjam       = $dataantriansaya['rentangjam'];
        $id_loket         = $dataantriansaya['id_loket'];
    }
    
    
    $date      = date_create($tgl_antri);
    $tgl_antri = date_format($date,"d-m-Y");

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
    echo '
    </br>
        <div class="row">
        <form class="form-horizontal" action="proses_konfirmasi.php" method="POST">
        <table class="table table-bordered table-light">
            <thead class="thead-dark">
                <tr>
                <th scope="col" colspan="4" class="text-center">Anda masih memiliki antrian yang belum selesai</th>
                </tr>
            </thead>
        </table>
        <table class="table table-bordered table-light col-sm-12">
            <tr>
                <td>Antrian Tanggal</td>
                <td>:</td>
                <td>'.$tgl_antri.'</td>
            </tr>
            <tr>
                <td>Rentang Jam</td>
                <td>:</td>
                <td>'.$rentangjam.'</td>
            </tr>
            <tr>
                <td>Status Antrian</td>
                <td>:</td>
                <td>'.$status_antrian.'</td>
            </tr>
        </table>
            <input type="hidden" id="id_jadwalAntrian" name="id_jadwalAntrian" value="'.$id_jadwalAntrian.'" class="form-control">
            <input type="hidden" id="rentangjam" name="rentangjam" value="'.$rentangjam.'" class="form-control">
            <input type="hidden" id="rentangjam" name="rentangjam" value="'.$id_loket.'" class="form-control">
            
        </form>
        </div>
    ';

}elseif(($cstatus_antrian=='Batal') AND ($update_status=='Batal')){?>
    <h2>Antrian anda dibatalkan secara otomatis oleh sistem. Silakan ambil ulang antrian anda.</h2>
    <form class="form-horizontal" action="prosesantrian-new.php" method="POST">
        <div class="form-group">
            <label for="tanggal" class="col-sm-3 control-label">Tanggal</label>
            <div class="col-sm-12">
                <input type="date" id="tgl_antrian" name="tgl_antrian" placeholder="Pilih Tanggal" value="<?php echo $_POST['tanggal']; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="rentangjam" class="col-sm-3 control-label">Jam</label>
            <div class="col-sm-12">
            <select name="rentangjam" id="rentangjam">
                <option value="1">08:00 - 09:00</option>
                <option value="2">09:00 - 10:00</option>
                <option value="3">10:00 - 11:00</option>
                <option value="4">11:00 - 12:00</option>
                <option value="5">13:00 - 14:00</option>
                <option value="6">14:00 - 15:00</option>
                <option value="7">15:00 - 16:00</option>
            </select>
                <!-- <input type="text" id="jam" name="jam" placeholder="Pilih Jam" value="<?php echo $_POST['tanggal']; ?>" class="form-control"> -->
            </div>
        </div>
        <div class="form-group">
            <!-- <label for="tanggal" class="col-sm-3 control-label">ID Mahasiswa</label> -->
            <div class="col-sm-12">
                <input type="hidden" id="id_mahasiswa" name="id_mahasiswa" placeholder="ID Mahasiswa" value="<?php echo $id_mahasiswa; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <!-- <label for="tanggal" class="col-sm-3 control-label">Loket Antrian</label> -->
            <div class="col-sm-12">
                <input type="hidden" id="id_loket" name="id_loket" placeholder="Pilih Tanggal" value="1" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Ambil</button>
    </form>
<?php 
}else{?>
    <form class="form-horizontal" action="prosesantrian-new.php" method="POST">
        <div class="form-group">
            <label for="tanggal" class="col-sm-3 control-label">Tanggal</label>
            <div class="col-sm-12">
                <input type="date" id="tgl_antrian" name="tgl_antrian" placeholder="Pilih Tanggal" value="<?php echo $_POST['tanggal']; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="rentangjam" class="col-sm-3 control-label">Jam</label>
            <div class="col-sm-12">
            <select name="rentangjam" id="rentangjam">
                <option value="1">08:00 - 09:00</option>
                <option value="2">09:00 - 10:00</option>
                <option value="3">10:00 - 11:00</option>
                <option value="4">11:00 - 12:00</option>
                <option value="5">13:00 - 14:00</option>
                <option value="6">14:00 - 15:00</option>
                <option value="7">15:00 - 16:00</option>
            </select>
                <!-- <input type="text" id="jam" name="jam" placeholder="Pilih Jam" value="<?php echo $_POST['tanggal']; ?>" class="form-control"> -->
            </div>
        </div>
        <div class="form-group">
            <!-- <label for="tanggal" class="col-sm-3 control-label">ID Mahasiswa</label> -->
            <div class="col-sm-12">
                <input type="hidden" id="id_mahasiswa" name="id_mahasiswa" placeholder="ID Mahasiswa" value="<?php echo $id_mahasiswa; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <!-- <label for="tanggal" class="col-sm-3 control-label">Loket Antrian</label> -->
            <div class="col-sm-12">
                <input type="hidden" id="id_loket" name="id_loket" placeholder="Pilih Tanggal" value="1" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Ambil</button>
    </form>
    <?php }?>
</div>
<?php
include('footer.php');
?>