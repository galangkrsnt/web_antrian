<?php
$pengumuman = "active";
include('header.php');
$hariini = date('d-m-Y');
?>
<div class="container">
    <h2 style="color:white" class="text-center">INFORMASI PENGUMUMAN</h2>
    <div class="card">
        <div class="card-body">
            Layanan loket keuangan STMIK AKAKOM pada tanggal <?php echo $hariini; ?> akan mulai beroperasi mulai pukul 10:00.
        </div>
    </div>
    
</div>

<?php
include('footer.php');
?>