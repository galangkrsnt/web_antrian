<?php
require_once '../config/koneksi.php';

Function bacaAdmin($sql){
$data = array();
$koneksi = koneksiPhp();
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) == 0) {
mysqli_close($koneksi);
return null;
}
$i=0;
while($baris = mysqli_fetch_assoc($hasil)){
$data[$i]['id_petugas']= $baris['id_petugas'];
$data[$i]['nip'] = $baris['nip'];
// $data[$i]['username'] = $baris['username'];
$data[$i]['password'] = $baris['password'];
$data[$i]['nama_petugas'] = $baris['nama_petugas'];
}
mysqli_close($koneksi);
return $data;
}

// id_petugas	nip	username	password	nama_petugas	level_id
function tambahAdmin($nip, $password, $nama_petugas){
$koneksi = koneksiPhp();
$sql = "insert into petugasloket (nip,password,nama_petugas) values('$nip','$password','$nama_petugas')";
$hasil = 0;
if(mysqli_query($koneksi, $sql))
$hasil = 1;
mysqli_close($koneksi);
return $hasil;
}

// function cariSemuaBarang2($kondisi){
//  $sql = "select barang.*, satuan.*, merk.*, penyimpanan.*, kategori.* from barang inner join satuan on barang.id_satuan = satuan.id_satuan
//  	 inner join merk on barang.id_merk = merk.id_merk 
//  	 inner join kategori on barang.id_kategori = kategori.id_kategori
//  	 inner join penyimpanan on barang.kode_tempat = penyimpanan.kode_tempat
//  	 where barang.$kondisi";
//  return bacaBarang2($sql);
// } 


function hapusAdmin($nama_barang){
$koneksi = koneksiPhp();
$sql = "delete from barang where nama_barang='$nama_barang'";
if (!mysqli_query($koneksi, $sql)){
die('Error: ' . mysqli_error());
}
$hasil = mysqli_affected_rows($koneksi);
mysqli_close($koneksi);
return $hasil;
}

// fungsi untuk mencari data user di tabel petugasloket
function cariUserAdmin($nip){
    $koneksi = koneksiPhp();
    // echo $username;
    $sql = "select * from petugasloket where nip='$nip'";
    $hasil = mysqli_query($koneksi, $sql);
    // print_r($hasil);
    if(mysqli_num_rows($hasil)>0){
    $baris=mysqli_fetch_assoc($hasil);
    $data['password'] = $baris['password'];
    $data['nip'] = $baris['nip'];
    $data['nama_petugas'] = $baris['nama_petugas'];
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
function otentikAdmin($nip, $password){
    $dataAdmin = array();
    //$pwdmd5 = md5($password;
    $dataAdmin = cariUserAdmin($nip);
    if($dataAdmin != null){
        if($password==$dataAdmin['password']){
            return true;
        }else{return false;}
    }else{
    return false;
    }
}
?>