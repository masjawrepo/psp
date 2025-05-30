<?php
//session_start();
require_once('../include/conn.php');
   
   if(function_exists($_GET['function'])) {
        $_GET['function']();
    }   



	function add_acceptor(){
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

		if ($stmt = $con->prepare('INSERT INTO acceptor (uuid_user, partus_saat_ini, haid_terakhir, status_kehamilan, gravida, partus, abortus, status_menyusui, riwayat_penyakit) VALUES (?,?,?,?,?,?,?,?,?)')) {
			$stmt->bind_param('sssssssss', $_POST['uuid_user'], $_POST['partus_saat_ini'], $_POST['haid_terakhir'], $_POST['status_kehamilan'], $_POST['gravida'], $_POST['partus'], $_POST['abortus'], $_POST['status_menyusui'], $_POST['riwayat_penyakit']);
			$stmt->execute();
			$con->close();
			$stmt->close();
			header('Location: ../pemeriksaan.php?uuid='.$_POST['uuid_user']);
		} else {
			$con->close();
			$stmt->close();
			echo 'Data Tidak Lengkap';
		}


	}


   

?>