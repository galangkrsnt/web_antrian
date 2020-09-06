<?php
require_once('../crud/antrian-crud.php');
require_once('../crud/jadwal-crud.php');
include('../phpqrcode/qrlib.php');
// include "phpqrcode/qrlib.php"; 
    date_default_timezone_set('Asia/Jakarta');
    // $tgl_ambil         = date('Y-m-d');
    
    // jam utk konfirmasi
    $jam_skrg          = date('H:i');
    $tgl_skrg          = date('Y-m-d');

    $id_jadwalAntrian  = $_POST['id_jadwalAntrian'];

    // cek jadwalantrian
    $sql = "SELECT * from jadwalantrian where id_jadwalAntrian = '$id_jadwalAntrian' and status_antrian = 'Pesan Antrian' order by id_jadwalAntrian desc limit 1";
    $data_max = bacaJadwalAntrianAkhir($sql);
    foreach($data_max as $dataantriansaya){
        $id_jadwalAntrian = $dataantriansaya['id_jadwalAntrian'];
        $id_mahasiswa     = $dataantriansaya['id_mahasiswa'];
        $tgl_antri        = $dataantriansaya['tgl_antri'];
        $status_antrian   = $dataantriansaya['status_antrian'];
        $rentangjam       = $dataantriansaya['rentangjam'];
        $id_loket         = $dataantriansaya['id_loket'];
    }

    $date  = date_create($tgl_antri);
    $date  = date_format($date,"d-m-Y");

    if($rentangjam == 1){
        if($tgl_antri == $tgl_skrg){
            if($jam_skrg <= '07:55'){ // 8 - 9
                // echo "silakan input pesan antrian";
                // cek no antrian akhir
                $sqlb ="SELECT MAX(no_antrian) AS no_antrian, id_jadwalAntrian FROM antrian
                        where tgl_antrian like '".$tgl_antri."'";
                $data_max_antrian = bacaMaxAntrian($sqlb);
                foreach($data_max_antrian as $antrian2){
                    $no_antrian = $antrian2['no_antrian']+1;
                }

                // update status antrian
                $ustatus_antrian = 'Menunggu';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
                
                // insert ke table antrian
                $hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antri, $ustatus_antrian, $no_antrian);
                header("Location: antrian-saya.php");
            }else{
                $ustatus_antrian = 'Batal';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);

                echo "<script>alert('Mohon Maaf antrian anda telah dibatalkan karena melewati batas waktu konfirmasi!');window.location='ambil-antrian.php'</script>";
                
            }
        }else{
            echo "<script>alert('Maaf Silakan lakukan konfirmasi antrian pada tanggal $date.');window.location='ambil-antrian.php'</script>";
        }
        
    }elseif($rentangjam == 2){ // 9 - 10
        if($tgl_antri == $tgl_skrg){
            if($jam_skrg <= '08:55'){ // 8 - 9
                // cek no antrian akhir
                $sqlb ="SELECT MAX(no_antrian) AS no_antrian, id_jadwalAntrian FROM antrian
                        where tgl_antrian like '".$tgl_antri."'";
                $data_max_antrian = bacaMaxAntrian($sqlb);
                foreach($data_max_antrian as $antrian2){
                    $no_antrian = $antrian2['no_antrian']+1;
                }

                // update status antrian
                $ustatus_antrian = 'Menunggu';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
                
                // insert ke table antrian
                $hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antri, $ustatus_antrian, $no_antrian);
                header("Location: antrian-saya.php");
            }else{
                $ustatus_antrian = 'Batal';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);

                echo "<script>alert('Mohon Maaf antrian anda telah dibatalkan karena melewati batas waktu konfirmasi!');window.location='ambil-antrian.php'</script>";
                
            }
        }else{
            echo "<script>alert('Maaf Silakan lakukan konfirmasi antrian pada tanggal $date.');window.location='ambil-antrian.php'</script>";
        }
        
    }elseif($rentangjam == 3){ // 10 - 11
        if($tgl_antri == $tgl_skrg){
            if($jam_skrg <= '09:55'){ // 8 - 9
                // cek no antrian akhir
                $sqlb ="SELECT MAX(no_antrian) AS no_antrian, id_jadwalAntrian FROM antrian
                        where tgl_antrian like '".$tgl_antri."'";
                $data_max_antrian = bacaMaxAntrian($sqlb);
                foreach($data_max_antrian as $antrian2){
                    $no_antrian = $antrian2['no_antrian']+1;
                }

                // update status antrian
                $ustatus_antrian = 'Menunggu';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
                
                // insert ke table antrian
                $hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antri, $ustatus_antrian, $no_antrian);
                header("Location: antrian-saya.php");
            }else{
                $ustatus_antrian = 'Batal';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);

                echo "<script>alert('Mohon Maaf antrian anda telah dibatalkan karena melewati batas waktu konfirmasi!');window.location='ambil-antrian.php'</script>";
                
            }
        }else{
            echo "<script>alert('Maaf Silakan lakukan konfirmasi antrian pada tanggal $date.');window.location='ambil-antrian.php'</script>";
        }
        
    }elseif($rentangjam == 4){ // 11 - 12
        if($tgl_antri == $tgl_skrg){
            if($jam_skrg <= '10:55'){ // 8 - 9
                // cek no antrian akhir
                $sqlb ="SELECT MAX(no_antrian) AS no_antrian, id_jadwalAntrian FROM antrian
                        where tgl_antrian like '".$tgl_antri."'";
                $data_max_antrian = bacaMaxAntrian($sqlb);
                foreach($data_max_antrian as $antrian2){
                    $no_antrian = $antrian2['no_antrian']+1;
                }

                // update status antrian
                $ustatus_antrian = 'Menunggu';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
                
                // insert ke table antrian
                $hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antri, $ustatus_antrian, $no_antrian);
                header("Location: antrian-saya.php");
            }else{
                $ustatus_antrian = 'Batal';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);

                echo "<script>alert('Mohon Maaf antrian anda telah dibatalkan karena melewati batas waktu konfirmasi!');window.location='ambil-antrian.php'</script>";
                
            }
        }else{
            echo "<script>alert('Maaf Silakan lakukan konfirmasi antrian pada tanggal $date.');window.location='ambil-antrian.php'</script>";
        }
        
    }elseif($rentangjam == 5){ // 13 - 14
        if($tgl_antri == $tgl_skrg){
            if($jam_skrg <= '12:55'){ // 8 - 9
                // cek no antrian akhir
                $sqlb ="SELECT MAX(no_antrian) AS no_antrian, id_jadwalAntrian FROM antrian
                        where tgl_antrian like '".$tgl_antri."'";
                $data_max_antrian = bacaMaxAntrian($sqlb);
                foreach($data_max_antrian as $antrian2){
                    $no_antrian = $antrian2['no_antrian']+1;
                }

                // update status antrian
                $ustatus_antrian = 'Menunggu';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
                
                // insert ke table antrian
                $hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antri, $ustatus_antrian, $no_antrian);
                header("Location: antrian-saya.php");
            }else{
                $ustatus_antrian = 'Batal';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);

                echo "<script>alert('Mohon Maaf antrian anda telah dibatalkan karena melewati batas waktu konfirmasi!');window.location='ambil-antrian.php'</script>";
                
            }
        }else{
            echo "<script>alert('Maaf Silakan lakukan konfirmasi antrian pada tanggal $date.');window.location='ambil-antrian.php'</script>";
        }
        
    }elseif($rentangjam == 6){ // 14 - 15
        if($tgl_antri == $tgl_skrg){
            if($jam_skrg <= '13:55'){ // 8 - 9
                // cek no antrian akhir
                $sqlb ="SELECT MAX(no_antrian) AS no_antrian, id_jadwalAntrian FROM antrian
                        where tgl_antrian like '".$tgl_antri."'";
                $data_max_antrian = bacaMaxAntrian($sqlb);
                foreach($data_max_antrian as $antrian2){
                    $no_antrian = $antrian2['no_antrian']+1;
                }

                // update status antrian
                $ustatus_antrian = 'Menunggu';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
                
                // insert ke table antrian
                $hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antri, $ustatus_antrian, $no_antrian);
                header("Location: antrian-saya.php");
            }else{
                $ustatus_antrian = 'Batal';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);

                echo "<script>alert('Mohon Maaf antrian anda telah dibatalkan karena melewati batas waktu konfirmasi!');window.location='ambil-antrian.php'</script>";
                
            }
        }else{
            echo "<script>alert('Maaf Silakan lakukan konfirmasi antrian pada tanggal $date.');window.location='ambil-antrian.php'</script>";
        }
        
    }elseif($rentangjam == 7){ // 15 - 16
        if($tgl_antri == $tgl_skrg){
            if($jam_skrg <= '14:55'){ // 8 - 9
                // cek no antrian akhir
                $sqlb ="SELECT MAX(no_antrian) AS no_antrian, id_jadwalAntrian FROM antrian
                        where tgl_antrian like '".$tgl_antri."'";
                $data_max_antrian = bacaMaxAntrian($sqlb);
                foreach($data_max_antrian as $antrian2){
                    $no_antrian = $antrian2['no_antrian']+1;
                }

                // update status antrian
                $ustatus_antrian = 'Menunggu';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);
                
                // insert ke table antrian
                $hasil2 = tambahAntrian($id_mahasiswa, $id_loket, $id_jadwalAntrian, $tgl_antri, $ustatus_antrian, $no_antrian);
                header("Location: antrian-saya.php");
            }else{
                $ustatus_antrian = 'Batal';
                $updatejadwal = updateStatusAntrian($id_jadwalAntrian, $ustatus_antrian);

                echo "<script>alert('Mohon Maaf antrian anda telah dibatalkan karena melewati batas waktu konfirmasi!');window.location='ambil-antrian.php'</script>";
                
            }
        }else{
            echo "<script>alert('Maaf Silakan lakukan konfirmasi antrian pada tanggal $date.');window.location='ambil-antrian.php'</script>";
        }
        
    }
    

    

?>