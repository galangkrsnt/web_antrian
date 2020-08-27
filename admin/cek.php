<?php 
// include "koneksi.php";
require_once '../config/koneksi.php';

$koneksi = koneksiPhp();
include('header.php');

?>
<!-- <!DOCTYPE html> -->
<!-- <html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hasil Validasi Antrian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/img/logo.png"> -->
	<!-- Bootstrap core CSS -->
    <!-- <link href="./assets/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- </head> -->
<!-- <body> -->
    <!-- Fixed navbar -->
    <!-- <nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">Validasi Antrian dengan QR Code</a>
        </div>
    </div>
    </nav> -->

    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Hasil Validasi Antrian</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">                                
                        <tr>
                            <td colspan="3">
                                <center>
                                <img src="assets/img/logo.png" width="90px">
                                <h1>UNIVERSITAS LURUILMU.COM</h1>
                                <p>Jl. Pulau Beringin Blok. B Pondok Kelapa Bengkulu Tengah</p>
                                <hr>
                            </td>
                        </tr>
                    </table>
                    <?php
                    $sql=mysqli_query($koneksi, "SELECT * FROM antrian WHERE id_mahasiswa='$_POST[id_mahasiswa]'");
                    $d=mysqli_fetch_array($sql);

                    if(mysqli_num_rows($sql) < 1){
                        ?>
                        <div class="alert alert-danger">
                            <center>
                            <strong>Maaf, Data tidak ditemukan..!</strong><br>
                            <i>Silahkan menghubungi Perguruan Tinggi terkait untuk menanyakan masalah ini</i>
                            </center>
                        </div>
                        <?php
                    }else{
                    ?>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID Antrian</th>
                            <th>ID Mahasiswa</th>
                            <th>ID Loket</th>
                            <th>ID Jadwal Antrian</th>
                            <th>TGL antrian</th>
                            <th>Status</th>
                            <th>No Antrian</th>
                        </tr>
                        <tr>
                            <td><?php echo $d['id_antrian']; ?></td>
                            <td><?php echo $d['id_mahasiswa']; ?></td>
                            <td><?php echo $d['id_loket']; ?></td>
                            <td><?php echo $d['id_jadwalAntrian']; ?></td>
                            <td><?php echo $d['tgl_antrian']; ?></td>
                            <td><?php echo $d['status_antrian']; ?></td>
                            <td><?php echo $d['no_antrian']; ?></td>
                        </tr>
                    </table>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-danger" href="scan-antrian.php">Kembali</a></center>
                </div>
            </div>
        </div>
    </div>
<!-- </body>
</html> -->

<?php
include('footer.php');
?>