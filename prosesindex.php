<?php
require_once 'config/koneksi.php';

// membaca antrian akhir
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
	$i++;
	}
	mysqli_close($koneksi);
	return $data;
}

?>