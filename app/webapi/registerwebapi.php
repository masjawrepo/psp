<?php
//session_start();
require_once('../include/conn.php');
   
   if(function_exists($_GET['function'])) {
        $_GET['function']();
    }   

   function add_user()
   {

    	global $con;
		$uuid = guidv4();

		$is_pasangan = 1;
		$is_anak = 1;
		
		if (isset($_POST['is_pasangan'])) $is_pasangan = 0;
		if (isset($_POST['is_anak'])) $is_anak = 0;


		exit( $is_pasangan.' '.$is_anak);
		/*
		uuid_bidan
		
		uuid_user
		nama_pasangan
		pendidikan
		pendidikan_pasangan
		alamat
		pekerjaan
		pekerjaan_pasangan
		asuransi
		anak_pria_hidup
		anak_wanita_hidup
		tahun_anak_terakhir
		bulan_anak_terakhir
		status_kb
		kb_terakhir

		
    	*/

		// Now we check if the data was submitted, isset() function will check if the data exists.
		if (!isset(	$_POST['uuid_bidan'],
						$_POST['fullname'], 
					  	$_POST['nik'],
					  	$_POST['dob'],
					  	$_POST['phone'], 
					  	$_POST['email'],
					  	$_POST['password'],
					  	$_POST['nama_pasangan'],
						$_POST['pendidikan'],
						$_POST['pendidikan_pasangan'],
						$_POST['alamat'],
						$_POST['pekerjaan'],
						$_POST['pekerjaan_pasangan'],
						$_POST['asuransi'],
						$_POST['anak_pria_hidup'],
						$_POST['anak_wanita_hidup'],
						$_POST['tahun_anak_terakhir'],
						$_POST['bulan_anak_terakhir'],
						$_POST['status_kb'],
						$_POST['kb_terakhir']
					  )) {
			// Could not get the data that should have been sent.
			//exit('Please complete the registration form 1'.$_POST['fullname'].$_POST['nik'].$_POST['address'].$_POST['pob'].$_POST['dob'].$_POST['phone'].$_POST['email'].$_POST['password']);
			exit('Please complete the registration form 1');
		}
		// Make sure the submitted registration values are not empty.
		if (	empty($_POST['uuid_bidan']) ||
				empty($_POST['fullname']) || 
			 	empty($_POST['nik']) || 
			 	empty($_POST['dob']) || 
			 	empty($_POST['phone']) || 
				empty($_POST['email']) || 
			 	empty($_POST['password']) || 
			 	empty($_POST['nama_pasangan']) || 
				empty($_POST['pendidikan']) || 
				empty($_POST['pendidikan_pasangan']) || 
				empty($_POST['alamat']) || 
				empty($_POST['pekerjaan']) || 
				empty($_POST['pekerjaan_pasangan']) || 
				empty($_POST['asuransi']) || 
				empty($_POST['anak_pria_hidup']) || 
				empty($_POST['anak_wanita_hidup']) || 
				empty($_POST['tahun_anak_terakhir']) || 
				empty($_POST['bulan_anak_terakhir']) || 
				empty($_POST['status_kb']) || 
				empty($_POST['kb_terakhir'])
			 	) {
				// One or more values are empty.
				exit('Please complete the registration form 2');
		}

		// We need to check if the account with that username exists.
		if ($stmt = $con->prepare('SELECT nik FROM user WHERE nik = ?')) {
			// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
			$stmt->bind_param('s', $_POST['nik']);
			$stmt->execute();
			$stmt->store_result();
			// Store the result so we can check if the account exists in the database.
			if ($stmt->num_rows > 0) {
				// Application already exists
				echo 'NIK yang di Input Sudah Terdaftar!';
			} else {
				$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
				$isActive = 1;
				if ($stmt = $con->prepare('INSERT INTO user (uuid , uuid_bidan, fullname ,nik, dob, phone, email, password, status) VALUES (?,?,?,?,?,?,?,?,?)')) {
					$stmt->bind_param('sssssssss', $uuid, $_POST['uuid_bidan'], $_POST['fullname'], $_POST['nik'], $_POST['dob'], $_POST['phone'], $_POST['email'], $password, $isActive);
					$stmt->execute();
					$stmt->close();


					if ($stmt = $con->prepare('INSERT INTO user_detail (uuid_user, nama_pasangan, pendidikan, pendidikan_pasangan, alamat, pekerjaan, pekerjaan_pasangan, asuransi, anak_pria_hidup, anak_wanita_hidup, tahun_anak_terakhir, bulan_anak_terakhir, status_kb, kb_terakhir, status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)')) {
						$stmt->bind_param('sssssssssssssss', $uuid, $_POST['nama_pasangan'], $_POST['pendidikan'], $_POST['pendidikan_pasangan'], $_POST['alamat'], $_POST['pekerjaan'], $_POST['pekerjaan_pasangan'], $_POST['asuransi'], $_POST['anak_pria_hidup'], $_POST['anak_wanita_hidup'], $_POST['tahun_anak_terakhir'], $_POST['bulan_anak_terakhir'], $_POST['status_kb'], $_POST['kb_terakhir'], $isActive);
						$stmt->execute();
						$stmt->close();
						header('Location: ../../greetings.php');
					} else {
						// Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
						$con->close();
						$stmt->close();
						echo 'Could not prepare statement!';
					}


				} else {
					// Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
					$con->close();
					$stmt->close();
					echo 'Could not prepare statement!';
				}
			}
		} else {
			// Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
			$con->close();
			$stmt->close();
			echo 'Could not prepare statement!';
		}
   }


    function cek_bidan()
    {
    	global $con;
    	$uuid = '"'.$_REQUEST['uuid'].'"';
    	$uuid = str_replace("\r\n","",$uuid);
		//$member = $_POST['phone_number'];
		//$member = 22;
		
		$query = $con->query('SELECT * FROM `admin` where uuid = '.$uuid.';');            
		while($row=mysqli_fetch_object($query))
		{
			$data =$row;
		}
		//$response=array(
		//               'status' => 1,
		//               'message' =>'Success',
		//               'data' => $data
		//            );
		//$query->close();
		$query->close();
		header('Content-Type: application/json');
		echo json_encode($data);
    }

?>