<?php
$antriansaya = "active";
include('../phpqrcode/qrlib.php');  
include('header.php');
error_reporting(0);
?>
<div class="container">
<?php 
require_once('../crud/jadwal-crud.php');
require_once('../crud/antrian-crud.php');
$status = '';
if(isset($_GET['status'])){
    $status = $_GET['status'];
}

    // ambil data antrian trakhir
    $sqlb ="SELECT * from jadwalantrian where id_mahasiswa = $id_mahasiswa and status_antrian != 'Batal' AND status_antrian != 'Pesan Antrian' order by id_jadwalAntrian desc limit 1";
    $data_max_jantrian = bacaJadwalAntrianAkhir($sqlb);
    foreach($data_max_jantrian as $antrian2){
        $id_jadwalAntrian1 = $antrian2['id_jadwalAntrian'];
        $id_mahasiswa = $antrian2['id_mahasiswa'];
        $tgl_antri = $antrian2['tgl_antri'];
        $status_antrian = $antrian2['status_antrian'];
        // $no_antrian = $antrian2['no_antrian'];
    }
    // $data_max_antrian = '';
    $no_antrian2 = '';
    $sqla = "SELECT * FROM antrian where id_jadwalAntrian = $id_jadwalAntrian1";
    $data_max_antrian = bacaMaxAntrian($sqla);
    if(isset($data_max_antrian)){
        foreach($data_max_antrian as $antrian1){
            $no_antrian2 = $antrian1['no_antrian'];
        }
        $no_antrian2 = $no_antrian2;
    }
    
    // $sql = "SELECT j.id_jadwalAntrian, j.id_mahasiswa, j.tgl_antri, a.status_antrian, a.no_antrian FROM jadwalantrian j 
    //         JOIN antrian a on a.id_antrian = j.id_jadwalAntrian 
    //         where j.id_mahasiswa = ".$id_mahasiswa." order by j.id_jadwalAntrian desc limit 1";
    // $data_max = bacaJadwalAntrianAkhir($sql);
    // foreach($data_max as $dataantriansaya){
    //     $id_jadwalAntrian = $dataantriansaya['id_jadwalAntrian'];
    //     $id_mahasiswa = $dataantriansaya['id_mahasiswa'];
    //     $tgl_antri = $dataantriansaya['tgl_antri'];
    //     $status_antrian = $dataantriansaya['status_antrian'];
    //     $no_antrian = $dataantriansaya['no_antrian'];
    // }

if(($id_jadwalAntrian1 != '') AND ($no_antrian2 != '')){
    
    $date=date_create($tgl_antri);
    $tgl_antrian_saya = date_format($date,"d-m-Y");


    $tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
    if (!file_exists($tempdir)) //Buat folder bername temp
    mkdir($tempdir);

    //isi qrcode jika di scan
    $codeContents = $id_mahasiswa;
    //nama file qrcode yang akan disimpan
    $namaFile=$id_mahasiswa.".png";
    //ECC Level
    $level=QR_ECLEVEL_H;
    //Ukuran pixel
    $UkuranPixel=10;
    //Ukuran frame
    $UkuranFrame=4;

    QRcode::png($codeContents, $tempdir.$namaFile, $level, $UkuranPixel, $UkuranFrame); 
echo '
</br>
    <div class="row">
    <table class="table table-bordered table-light">
        <thead class="thead-dark">
            <tr>
            <th scope="col" colspan="4" class="text-center">Antrian Saya</th>
            </tr>
        </thead>
    </table>
    <table class="table table-bordered table-light col-sm-12">
        <tr>
            <td style=width:15%>No. Antrian</td>
            <td>:</td>
            <td>'.$no_antrian2.'</td>
            <td rowspan="4"><img src="'.$tempdir.$namaFile.'" /></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td >'.$status_antrian.'</td>

        </tr>
        <tr>
            <td>Tanggal Antrian</td>
            <td>:</td>
            <td>'.$tgl_antrian_saya.'</td> 
        </tr>
        <tr>
            
        </tr>
    </table>
    </div>
';
}else{
    echo '
    </br>
        <div class="row">
        <table class="table table-bordered table-light">
            <thead class="thead-dark">
                <tr>
                <th scope="col" colspan="4" class="text-center">Antrian Saya</th>
                </tr>
            </thead>
        </table>
        <table class="table table-bordered table-light col-sm-12">
            <tr>
                <td colspan="3" class="text-center">Anda Belum Mengambil No. Antrian</td>
            </tr>
        </table>
        </div>
    ';
}
?>
    
</div>
<?php
include('footer.php');
?>