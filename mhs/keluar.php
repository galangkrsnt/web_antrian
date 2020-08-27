<?php
session_start();
// unset($_SESSION['username']);
unset($_SESSION['id_mahasiswa']);
unset($_SESSION['nim']);
unset($_SESSION['nama_mahasiswa']);
session_destroy();
header("Location: ../index.php")
?>