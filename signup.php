<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Syarat & Ketentuan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="signup.php">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-content">
        <?php
            if(isset($_GET['berhasil'])){
                echo '
                <form class="form-horizontal" action="" method="" class="border border-success" style="border-style: solid;border-color: green;background-color: #aef59d">
                    <div class="col-sm-12">
                        <p class="text-center" style="color:black"><b>Registrasi Berhasil</b></p>
                    </div>
                </form>';
            }elseif(isset($_GET['gagal'])){
                echo '
                <form class="form-horizontal" action="" method="" class="border border-danger" style="border-style: solid;border-color: red;background-color: #f09e9e">
                    <div class="col-sm-12">
                        <p class="text-center" style="color:black"><b>Registrasi Gagal</b></p>
                    </div>
                </form>';
            }
        ?>
        
        <form class="form-horizontal" action="mhs/prosesmahasiswa.php" method="POST">
            <h3>FORM PENDAFTARAN AKUN</h3>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Nama Lengkap*</label>
                <div class="col-sm-12">
                    <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Nama Lengkap" class="form-control" autofocus required>
                </div>
            </div>
            <div class="form-group">
                <label for="lastName" class="col-sm-3 control-label">NIM*</label>
                <div class="col-sm-12">
                    <input type="text" id="nim" name="nim" placeholder="NIM" class="form-control" autofocus required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email* </label>
                <div class="col-sm-12">
                    <input type="email" id="email_mahasiswa" name="email_mahasiswa" placeholder="Email" class="form-control" name= "email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password*</label>
                <div class="col-sm-12">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Wajib Diisi</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form> <!-- /form -->
    </div>

    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
        <small>Copyright &copy; Okta</small>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>