<?php
$profile = "active";
require_once('../crud/mhs-crud.php');
include('header.php');
?>
<div class="container">
<div class="row">
    <table class="table table-bordered table-light">
        <thead class="thead-dark">
            <tr>
            <th scope="col" colspan="4" class="text-center">Profil Saya</th>
            </tr>
        </thead>
    </table>
    <?php
    $sql = "SELECT * from mahasiswa where id_mahasiswa = ".$id_mahasiswa;
    $data = bacaMahasiswa($sql);
    foreach($data as $data_mhs){
    $id_mahasiswa = $data_mhs['id_mahasiswa'];
    $password = $data_mhs['password'];
    $nim = $data_mhs['nim'];
    $nama_mahasiswa = $data_mhs['nama_mahasiswa'];
    $email_mahasiswa = $data_mhs['email_mahasiswa'];
    // $nama_mahasiswa = $data_mhs['no_antrian'];
    }
    ?>
    <table class="table table-bordered table-light col-sm-12">
        <tr>
            <td style=width:10px>Nama</td>
            <td style=width:10px>:</td>
            <td><?= $nama_mahasiswa ?></td>
        </tr>
        <tr>
            <td>Nim</td>
            <td>:</td>
            <td><?= $nim ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?= $email_mahasiswa ?></td>
        </tr>
        <tr>
            <td colspan=3>
                <a href="keluar.php" class="btn btn-primary">Log Out</a>
            </td>
        </tr>
    </table>
</div>
</div>

<?php
include('footer.php');
?>