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
                                <h1>STMIK AKAKOM YOGYAKARTA</h1>
                                <p></p>
                                <hr>
                        </td>
                    </tr>
                </table>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM antrian WHERE id_mahasiswa='$_POST[id_mahasiswa]'");
                $d = mysqli_fetch_array($sql);

                if (mysqli_num_rows($sql) < 1) {
                ?>
                    <div class="alert alert-danger">
                        <center>
                            <strong>Maaf, Data tidak ditemukan..!</strong><br>
                            <i>Silahkan menghubungi Perguruan Tinggi terkait untuk menanyakan masalah ini</i>
                        </center>
                    </div>
                <?php
                } else {
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

                <?php
                    $id = $d['id_antrian'] + 1;
                    $sql1 = mysqli_query($koneksi, "SELECT * FROM antrian WHERE id_antrian='$id'");
                    $d1 = mysqli_fetch_array($sql1);
                    $id_mhs = $d1['id_mahasiswa'];
                    $sql2 = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id_mhs'");
                    $d2 = mysqli_fetch_array($sql2);

                    $to = $d2['email_mahasiswa'];
                    $subject = "Keuangan Akakom";
                    $txt = "Silahkan menuju loket pembayaran";
                    $headers = "From: oktaviasusanti@gmail.com";

                    mail($to, $subject, $txt, $headers);
                } ?>
            </div>
            <div class="panel-footer">
                <form method="POST">
                    <input type="text" name="status_antrian" value="selesai" hidden>
                    <button type="submit" class="btn btn-primary btn-block" value="submit">Selesai</button>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $status = $_POST['status_antrian'];
                    $sql3 = mysqli_query($koneksi, "UPDATE antrian SET status_antrian = '$status' WHERE id_mahasiswa='$id_mhs'");
                    $d3 = mysqli_fetch_array($sql3);
                    header("Location:scan-antrian.php");
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- </body>
</html> -->

<?php
include('footer.php');
?>