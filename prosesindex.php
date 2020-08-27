<?php
require_once 'config/koneksi.php';
// `id_jadwalAntrian`, `id_mahasiswa`, `id_loket`, `tgl_ambil`, `tgl_antri`, `tgl_akhir`, `status_antrian`, `total_antrian`
Function bacaJadwal($sql){
$data = array();
$koneksi = koneksiPhp();
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) == 0) {
mysqli_close($koneksi);
return null;
}
$i=0;
while($baris = mysqli_fetch_assoc($hasil)){
$data[$i]['id_jadwalAntrian']= $baris['id_jadwalAntrian'];
$data[$i]['id_mahasiswa'] = $baris['id_mahasiswa'];
$data[$i]['id_loket'] = $baris['id_loket'];
$data[$i]['tgl_ambil'] = $baris['tgl_ambil'];
$data[$i]['tgl_antri'] = $baris['tgl_antri'];
$data[$i]['status_antrian'] = $baris['status_antrian'];
$data[$i]['total_antrian'] = $baris['total_antrian'];
$i++;
}
mysqli_close($koneksi);
return $data;
}

Function bacaMaxJadwal($sql){
	$data = array();
	$koneksi = koneksiPhp();
	$hasil = mysqli_query($koneksi, $sql);
	
	if (mysqli_num_rows($hasil) == 0) {
	mysqli_close($koneksi);
	return null;
	}
	$i=0;
	while($baris = mysqli_fetch_assoc($hasil)){
	$data[$i]['id_jadwalAntrian']= $baris['id_jadwalAntrian'];
	// $data[$i]['nama_barang'] = $baris['nama_barang'];
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
	$data[$i]['jumlah']= $baris['jumlah'];
	// $data[$i]['nama_barang'] = $baris['nama_barang'];
	$i++;
	}
	mysqli_close($koneksi);
	return $data;
}

Function bacaJadwalAntrianAkhir($sql){
	$data = array();
	$koneksi = koneksiPhp();
	$hasil = mysqli_query($koneksi, $sql);
	
	if (mysqli_num_rows($hasil) == 0) {
	mysqli_close($koneksi);
	return null;
	}
	$i=0;
	while($baris = mysqli_fetch_assoc($hasil)){
	$data[$i]['id_jadwalAntrian']= $baris['id_jadwalAntrian'];
	$data[$i]['id_mahasiswa']= $baris['id_mahasiswa'];
	$data[$i]['tgl_antri']= $baris['tgl_antri'];
	$data[$i]['status_antrian']= $baris['status_antrian'];
	$data[$i]['id_loket']= $baris['id_loket'];
	$data[$i]['rentangjam']= $baris['rentangjam'];
	// $data[$i]['nama_barang'] = $baris['nama_barang'];
	$i++;
	}
	mysqli_close($koneksi);
	return $data;
}

Function bacaMaxAntrian($sql){
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
	$data[$i]['id_jadwalAntrian']= $baris['id_jadwalAntrian'];
	// $data[$i]['nama_barang'] = $baris['nama_barang'];
	$i++;
	}
	mysqli_close($koneksi);
	return $data;
}
Function bacaJadwalAntrianAkhir2($sql){
	$data = array();
	$koneksi = koneksiPhp();
	$hasil = mysqli_query($koneksi, $sql);
	
	if (mysqli_num_rows($hasil) == 0) {
	mysqli_close($koneksi);
	return null;
	}
	$i=0;
	while($baris = mysqli_fetch_assoc($hasil)){
	// $data[$i]['id_jadwalAntrian']= $baris['id_jadwalAntrian'];
	// $data[$i]['id_mahasiswa']= $baris['id_mahasiswa'];
	// $data[$i]['tgl_antri']= $baris['tgl_antri'];
	// $data[$i]['status_antrian']= $baris['status_antrian'];
	// $data[$i]['id_loket']= $baris['id_loket'];
	// $data[$i]['rentangjam']= $baris['rentangjam'];
	$data[$i]['no_antrian'] = $baris['no_antrian'];
	$i++;
	}
	mysqli_close($koneksi);
	return $data;
}


function tambahJadwalAntrian($id_mahasiswa, $id_loket, $tgl_ambil, $tgl_antrian, $status_antrian, $rentangjam){
$koneksi = koneksiPhp();
$sql = "INSERT INTO jadwalantrian (id_mahasiswa, id_loket, tgl_ambil, tgl_antri, status_antrian, rentangjam) VALUES ('$id_mahasiswa', '$id_loket', '$tgl_ambil', '$tgl_antrian', '$status_antrian', '$rentangjam')";
$hasil = 0;
if(mysqli_query($koneksi, $sql))
$hasil = 1;
mysqli_close($koneksi);
return $hasil;
}


// function ubahBarang($kode_barang, $nama_barang, $total_jumlah, $kondisi, $asal, $lokasiawal, $status_barang, $gambar, $tanggal_pengadaan, $id_satuan, $id_kategori, $id_merk, $kode_tempat){
// $koneksi = koneksiPhp();
// $sql = "UPDATE barang SET
// nama_barang = '$nama_barang',
// total_jumlah = '$total_jumlah',
// kondisi = '$kondisi',
// asal = '$asal',
// lokasiawal = '$lokasiawal',
// status_barang = '$status_barang',
// gambar = '$gambar',
// tanggal_pengadaan = '$tanggal_pengadaan',
// id_satuan = '$id_satuan',
// id_kategori = '$id_kategori',
// id_merk = '$id_merk',
// kode_tempat = '$kode_tempat'
// WHERE kode_barang='$kode_barang'";
// if (mysqli_query($koneksi, $sql)) {
// $hasil = true;
// } else {
// $hasil = false;
// echo "$sql";
// }
// mysqli_close($koneksi);
// return $hasil;
// }

function updateStatusAntrian($id_jadwalAntrian, $status_antrian){
$koneksi = koneksiPhp();
$sql = "UPDATE jadwalantrian SET
status_antrian = '$status_antrian'
WHERE id_jadwalAntrian='$id_jadwalAntrian'";
if (mysqli_query($koneksi, $sql)) {
$hasil = true;
} else {
$hasil = false;
echo "$sql";
}
mysqli_close($koneksi);
return $hasil;
}

// function ubahBarang3($kode_barang, $total_jumlah){
// $koneksi = koneksiPhp();
// $sql = "UPDATE barang SET
// total_jumlah = total_jumlah+'$total_jumlah'
// WHERE kode_barang='$kode_barang'";
// if (mysqli_query($koneksi, $sql)) {
// $hasil = true;
// } else {
// $hasil = false;
// echo "$sql";
// }
// mysqli_close($koneksi);
// return $hasil;
// }

// function cariSemuaBarang2($kondisi){
//  $sql = "select barang.*, satuan.*, merk.*, penyimpanan.*, kategori.* from barang inner join satuan on barang.id_satuan = satuan.id_satuan
//  	 inner join merk on barang.id_merk = merk.id_merk 
//  	 inner join kategori on barang.id_kategori = kategori.id_kategori
//  	 inner join penyimpanan on barang.kode_tempat = penyimpanan.kode_tempat
//  	 where barang.$kondisi";
//  return bacaBarang2($sql);
// } 


function hapusJadwal($nama_barang){
$koneksi = koneksiPhp();
$sql = "delete from barang where nama_barang='$nama_barang'";
if (!mysqli_query($koneksi, $sql)){
die('Error: ' . mysqli_error());
}
$hasil = mysqli_affected_rows($koneksi);
mysqli_close($koneksi);
return $hasil;
}

?>