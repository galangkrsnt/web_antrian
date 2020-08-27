<?php
session_start();
unset($_SESSION['nip']);
// unset($_SESSION['nip']);
unset($_SESSION['nama_petugas']);
session_destroy();
header("Location: ../index.php")
?>