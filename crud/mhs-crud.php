<?php
require_once '../config/koneksi.php';

Function bacaMahasiswa($sql){
$data = array();
$koneksi = koneksiPhp();
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) == 0) {
mysqli_close($koneksi);
return null;
}
$i=0;
// `id_mahasiswa`, `username`, `password`, `nim`, `nama_mahasiswa`, `email_mahasiswa`, `jur_mahasiswa`, `notelp_mahasiswa`
while($baris = mysqli_fetch_assoc($hasil)){
$data[$i]['id_mahasiswa']= $baris['id_mahasiswa'];
// $data[$i]['username'] = $baris['username'];
$data[$i]['password'] = $baris['password'];
$data[$i]['nim'] = $baris['nim'];
$data[$i]['nama_mahasiswa'] = $baris['nama_mahasiswa'];
$data[$i]['email_mahasiswa'] = $baris['email_mahasiswa'];
// $data[$i]['jur_mahasiswa'] = $baris['jur_mahasiswa'];
// $data[$i]['notelp_mahasiswa'] = $baris['notelp_mahasiswa'];
$i++;
}
mysqli_close($koneksi);
return $data;
}

function tambahMhs($password, $nim, $nama_mahasiswa, $email_mahasiswa){
$koneksi = koneksiPhp();
$sql = "insert into mahasiswa (password,nim,nama_mahasiswa,email_mahasiswa) values('$password', '$nim', '$nama_mahasiswa', '$email_mahasiswa')";
$hasil = 0;
if(mysqli_query($koneksi, $sql))
$hasil = 1;
mysqli_close($koneksi);
return $hasil;
}

function cariMahasiswa($kondisi){
 $sql = "select * from mahasiswa where id_mahasiswa = '$kondisi'";
 return bacaMahasiswa($sql);
} 

// fungsi untuk mencari data user di tabel mahasiswa
function cariUserMhs($nim){
    $koneksi = koneksiPhp();
    // echo $username;
    $sql = "select * from mahasiswa where nim='$nim'";
    $hasil = mysqli_query($koneksi, $sql);
    // print_r($hasil);
    if(mysqli_num_rows($hasil)>0){
    $baris=mysqli_fetch_assoc($hasil);
    $data['password'] = $baris['password'];
    $data['nama_mahasiswa'] = $baris['nama_mahasiswa'];
    $data['id_mahasiswa'] = $baris['id_mahasiswa'];
    $data['nim'] = $baris['nim'];
    mysqli_close($koneksi);
    return $data;
    }else{
    mysqli_close($koneksi);
    return null;
    }
}
// memeriksa otentikasi user berdasar username dan password
// jika user dinyatakan otentik, hasil fungsi = true
// sebaliknya hasil fungsi = false
function otentikMhs($nim, $password){
    $dataMhs = array();
    //$pwdmd5 = md5($password;
    $dataMhs = cariUserMhs($nim);
    if($dataMhs != null){
        if($password==$dataMhs['password']){
            return true;
        }else{return false;}
    }else{
    return false;
    }
}
?>