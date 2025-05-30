<?php
//session_start();
require_once('../include/conn.php');
   
   if(function_exists($_GET['function'])) {
        $_GET['function']();
    }   



	function add_pemeriksaan(){
    	global $con;
    	

/*
    	exit( $_POST['uuid'].' '.
    			$_POST['partus_saat_ini'].' '.
    			$_POST['haid_terakhir'].' '.
    			$_POST['status_kehamilan'].' '.
    			$_POST['gravida'].' '.
    			$_POST['partus'].' '.
    			$_POST['abortus'].' '.
    			$_POST['status_menyusui'].' '.
    			$_POST['riwayat_penyakit']);
*/ 	

		$uuid_user = $_POST['uuid_user'];
    	$keadaan_umum = $_POST['keadaan_umum'];
		$berat_badan = $_POST['berat_badan'];
		$sbp = $_POST['sbp'];
		$dbp = $_POST['dbp'];
		$tanda_radang = $_POST['tanda_radang'];
		$tumor = $_POST['tumor'];
		$posisi_rahim = $_POST['posisi_rahim'];
		$pilihan_kontrasepsi = $_POST['pilihan_kontrasepsi'];
		$tgl_dilayani = $_POST['tgl_dilayani'];
		//Implan(1) or IUD(2)
		if ($pilihan_kontrasepsi == "1" || $pilihan_kontrasepsi == "2"){
			$tgl_kunjungan_ulang = NULL;
			$tgl_dicabut_kontrasepsi = $_POST['tgl_dicabut_kontrasepsi'];
		} else {
			$tgl_kunjungan_ulang = $_POST['tgl_kunjungan_ulang'];
			$tgl_dicabut_kontrasepsi = NULL;
		}
		//$tgl_kunjungan_ulang = (isset($_POST['tgl_kunjungan_ulang'])) ? $_POST['tgl_kunjungan_ulang'] : NULL ;
		//$tgl_dicabut_kontrasepsi = (isset($_POST['tgl_dicabut_kontrasepsi'])) ? $_POST['tgl_dicabut_kontrasepsi'] : NULL ;
		$tindakan = $_POST['tindakan'];
		$hasil_pemeriksaan = $_POST['hasil_pemeriksaan'];
		$catatan = $_POST['catatan'];

    	

		if ($stmt = $con->prepare('INSERT INTO pemeriksaan (uuid_user, keadaan_umum, berat_badan, sbp, dbp, tanda_radang, tumor, posisi_rahim, pilihan_kontrasepsi, tgl_dilayani, tgl_kunjungan_ulang, tgl_dicabut_kontrasepsi, tindakan, hasil_pemeriksaan, catatan, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())')) {
			$stmt->bind_param('sssssssssssssss', $uuid_user, $keadaan_umum, $berat_badan, $sbp, $dbp, $tanda_radang, $tumor, $posisi_rahim, $pilihan_kontrasepsi, $tgl_dilayani, $tgl_kunjungan_ulang, $tgl_dicabut_kontrasepsi, $tindakan, $hasil_pemeriksaan, $catatan);
			$stmt->execute();
			$stmt->close();
			//echo 'CIHUUUYYYY';

			$query_nik = $con->query('SELECT * FROM `user` as a where a.uuid = "'.$uuid_user.'";');         
			while($row_nik=mysqli_fetch_assoc($query_nik))
			{
				$nik = $row_nik['nik'];
			}
			$query_nik->close();


			$con->close();

			header('Location: ../check.php#check='.$nik);
		} else {
			$con->close();
			$stmt->close();
			echo 'Data Tidak Lengkap';
		}


	}


   

?>