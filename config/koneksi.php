<?php
Function koneksiPhp(){
/*$servername = "mysql.hostinger.co.id";
$username = "username";
$password = "password dari hostinger";
$dbname = "db dari hostinger";*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_antrian";

// menciptakankoneksi
$koneksi = mysqli_connect($servername, $username, $password, $dbname);
// Cekkoneksi
if (!$koneksi) {
die("Koneksigagal: " . mysqli_connect_error());
}
return $koneksi;
}
?>