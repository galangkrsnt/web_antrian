<?php
$pengumuman = "active";
include('header.php');
$hariini = date('d-m-Y');
?>


<div class="container">
    <h2 style="color:white" class="text-center">INFORMASI PENGUMUMAN</h2>
    <div class="row ">
    <div class="mx-auto" width=100%>
        <button class="btn-menu" id="tambah" name="tambah" onclick=tambah()><i class="fa fa-plus-square"></i></button>&nbsp;
        <button class="btn-menu" id="tampil" name="tampil" onclick=tampil()><i class="fa fa-navicon"></i></button>
    </div>
        
    </div>
    

    <form class="form-horizontal" action="jadwal-antrian.php" method="POST" id="form-tambah" name="form-tambah" style="display:none">
        <div class="form-group">
            <label for="tanggal" class="col-sm-12 control-label">Input Pengumuman</label>
            <div class="col-sm-12">
                <input type="text" id="judul" name="judul" placeholder="Judul Pengumuman" class="form-control">
                <textarea name="isi" id="isi" cols="30" rows="10" placeholder="Isi Pengumuman" class="form-control"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </form>
    <br>
    <div class="card" id="tampil-data" name="tampil-data" style="display:none">
        <div class="card-body">
            Layanan loket keuangan STMIK AKAKOM pada tanggal <?php echo $hariini; ?> akan mulai beroperasi mulai pukul 10:00.
        </div>
    </div>
    
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#form-tambah').hide();
        $('#tampil-data').hide();

    })
    function tambah() {
        $('#form-tambah').show();
        $('#tampil-data').hide();
    }
    function tampil() {
        $('#form-tambah').hide();
        $('#tampil-data').show();
    }
    </script>
<?php
include('footer.php');
?>