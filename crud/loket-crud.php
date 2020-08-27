<?php
require_once '../config/koneksi.php';

Function bacaLoket($sql){
    $data = array();
    $koneksi = koneksiPhp();
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) == 0) {
    mysqli_close($koneksi);
    return null;
    }
    $i=0;
    while($baris = mysqli_fetch_assoc($hasil)){
    $data[$i]['id_Loket']= $baris['id_Loket'];
    $data[$i]['no_Loket'] = $baris['no_Loket'];
    $data[$i]['nama_Loket'] = $baris['nama_Loket'];
    $i++;
    }
    mysqli_close($koneksi);
    return $data;
}

Function hitungJumlahAntrian($sql){
	$data = array();
	$koneksi = koneksiPhp();
	$hasil = mysqli_query($koneksi, $sql);
	
	if (mysqli_num_rows($hasil) == 0) {
	mysqli_close($koneksi);
	return null;
	}
	$i=0;
	while($baris = mysqli_fetch_assoc($hasil)){
	$data[$i]['no_antrian']= $baris['no_antrian'];
	// $data[$i]['nama_barang'] = $baris['nama_barang'];
	$i++;
	}
	mysqli_close($koneksi);
	return $data;
}

function tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antrian, $status_antrian, $no_antrian){
$koneksi = koneksiPhp();
$sql = "INSERT INTO antrian (id_mahasiswa, id_loket, id_jadwalAntrian, tgl_antrian, status_antrian, no_antrian) VALUES ('$id_mahasiswa','$id_loket','$id_jadwalAntrian','$tgl_antrian','$status_antrian',$no_antrian)";
$hasil = 0;
if(mysqli_query($koneksi, $sql))
$hasil = 1;
mysqli_close($koneksi);
return $hasil;
}


function ubahBarang($kode_barang, $nama_barang, $total_jumlah, $kondisi, $asal, $lokasiawal, $status_barang, $gambar, $tanggal_pengadaan, $id_satuan, $id_kategori, $id_merk, $kode_tempat){
$koneksi = koneksiPhp();
$sql = "UPDATE barang SET
nama_barang = '$nama_barang',
total_jumlah = '$total_jumlah',
kondisi = '$kondisi',
asal = '$asal',
lokasiawal = '$lokasiawal',
status_barang = '$status_barang',
gambar = '$gambar',
tanggal_pengadaan = '$tanggal_pengadaan',
id_satuan = '$id_satuan',
id_kategori = '$id_kategori',
id_merk = '$id_merk',
kode_tempat = '$kode_tempat'
WHERE kode_barang='$kode_barang'";
if (mysqli_query($koneksi, $sql)) {
$hasil = true;
} else {
$hasil = false;
echo "$sql";
}
mysqli_close($koneksi);
return $hasil;
}

function ubahBarang2($kode_barang, $jumlah){
$koneksi = koneksiPhp();
$sql = "UPDATE barang SET
total_jumlah = total_jumlah-'$jumlah'
WHERE kode_barang='$kode_barang'";
if (mysqli_query($koneksi, $sql)) {
$hasil = true;
} else {
$hasil = false;
echo "$sql";
}
mysqli_close($koneksi);
return $hasil;
}

function ubahBarang3($kode_barang, $total_jumlah){
$koneksi = koneksiPhp();
$sql = "UPDATE barang SET
total_jumlah = total_jumlah+'$total_jumlah'
WHERE kode_barang='$kode_barang'";
if (mysqli_query($koneksi, $sql)) {
$hasil = true;
} else {
$hasil = false;
echo "$sql";
}
mysqli_close($koneksi);
return $hasil;
}

// fungsi untuk mencari antrian tertinggi
function cariMaxAntrian(){
	$sql = "SELECT MAX(no_antrian) AS antrian FROM antrian";
	return bacaMaxAntrian($sql);
} 

function cariSemuaBarang2($kondisi){
 $sql = "select barang.*, satuan.*, merk.*, penyimpanan.*, kategori.* from barang inner join satuan on barang.id_satuan = satuan.id_satuan
 	 inner join merk on barang.id_merk = merk.id_merk 
 	 inner join kategori on barang.id_kategori = kategori.id_kategori
 	 inner join penyimpanan on barang.kode_tempat = penyimpanan.kode_tempat
 	 where barang.$kondisi";
 return bacaBarang2($sql);
} 


function hapusBarang($nama_barang){
$koneksi = koneksiPhp();
$sql = "delete from barang where nama_barang='$nama_barang'";
if (!mysqli_query($koneksi, $sql)){
die('Error: ' . mysqli_error());
}
$hasil = mysqli_affected_rows($koneksi);
mysqli_close($koneksi);
return $hasil;
}

// fungsi untuk mencari data user di tabel mahasiswa

// memeriksa otentikasi user berdasar username dan password
// jika user dinyatakan otentik, hasil fungsi = true
// sebaliknya hasil fungsi = false

?>