<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="30">

    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- custon css untuk index -->
    <link rel="stylesheet" href="assets/css/cssone.css">

    <title>Halaman Beranda</title>
  </head>
  <body class="d-flex flex-column">
    <div class="header text-center">

        <H2 style="color: white"><span><img src="assets/images/logo-header.png" alt="logo" ></span></H2>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav navbar-center">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="snk.php">Syarat & Ketentuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    require_once 'prosesindex.php';

    date_default_timezone_set('Asia/Jakarta');

    $tgl_skrg = date('Y-m-d');

    $sql ="SELECT * from antrian where status_antrian = 'Dilayani' and tgl_antrian like '$tgl_skrg' order by id_antrian desc limit 1";
    $data_max_antrian = bacaMaxAntrian($sql);
    if(isset($data_max_antrian)){
        foreach($data_max_jantrian as $antrian){
            // $id_jadwalAntrian1 = $antrian2['id_jadwalAntrian'];
            // $id_mahasiswa = $antrian2['id_mahasiswa'];
            // $tgl_antri = $antrian2['tgl_antri'];
            // $status_antrian = $antrian2['status_antrian'];
            $no_antrian = $antrian['no_antrian'];
        }
        // $id_jadwalAntrian1 = $id_jadwalAntrian1;
        // $id_mahasiswa = $id_mahasiswa;
        // $tgl_antri = $tgl_antri;
        // $status_antrian = $status_antrian;
        $no_antrian = $no_antrian;
    }else{
        $no_antrian = 0;
    }

    // $id_jadwalAntrian1 = '';
    // $no_antrian1 = '';
    // $sqla = "SELECT * FROM antrian where id_jadwalAntrian = '$id_jadwalAntrian1'";
    // $data_max_antrian = bacaMaxAntrian($sqla);
    // if(isset($data_max_antrian)){
    //     foreach($data_max_antrian as $antrian1){
    //         $no_antrian1 = $antrian1['no_antrian'];
    //     }
    //     $no_antrian1 = $no_antrian1;
    // }

    // $sqlb ="SELECT * from jadwalantrian where id_loket = 2 order by id_jadwalAntrian desc limit 1";
    // $data_max_jantrian2 = bacaJadwalAntrianAkhir($sqlb);
    // if(isset($data_max_jantrian2)){
    // foreach($data_max_jantrian2 as $antrian2){
    //     $id_jadwalAntrian2 = $antrian2['id_jadwalAntrian'];
    //     $id_mahasiswa = $antrian2['id_mahasiswa'];
    //     $tgl_antri = $antrian2['tgl_antri'];
    //     $status_antrian = $antrian2['status_antrian'];
    //     // $no_antrian = $antrian2['no_antrian'];
    // }}
    // $id_jadwalAntrian2 = '';
    // $no_antrian_2 = '';
    // $sqla2 = "SELECT * FROM antrian where id_jadwalAntrian = '$id_jadwalAntrian2'";
    // $data_max_antrian2 = bacaMaxAntrian($sqla2);
    // if(isset($data_max_antrian2)){
    //     foreach($data_max_antrian2 as $antrian2){
    //         $no_antrian_2 = $antrian2['no_antrian'];
    //     }
    // }
    ?>
    <div id="page-content">
        <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-7">
            <h1 class="font-weight-light mt-4 text-white">SELAMAT DATANG</h1>
            <p style=color:white>Antrian yang sedang berlangsung :</p>
            <table class="table table-bordered table-light">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center" style="width:100%">LOKET 1</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>No. Antrian :</td>
                    </tr>
                    <tr>
                    <td>
                        <div class=card>
                            <div class="card-body">
                            <?php 
                                if($no_antrian == 0){
                                    echo "0";
                                }else{
                                    echo $no_antrian;
                                }
                            ?>
                            </div>
                        </div>
                    </td>

                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>

    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
        <small>Copyright &copy; Oktavia Susanti</small>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>