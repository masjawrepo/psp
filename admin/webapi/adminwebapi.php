<?php
//session_start();
require_once('../include/conn.php');
   
   if(function_exists($_GET['function'])) {
        $_GET['function']();
    }   

   function signin()
   {
    	global $con;
		
    	
		// Now we check if the data was submitted, isset() function will check if the data exists.
		if (!isset($_POST['username'], 
					  $_POST['password'])) {
			// Could not get the data that should have been sent.
			header('Location: ../../akses-pengguna.php#falsecred');
		}
		// Make sure the submitted registration values are not empty.
		if (empty($_POST['username']) || 
			 empty($_POST['password']) ) {
			// One or more values are empty.
			header('Location: ../../akses-pengguna.php#falsecred');
		}

		// We need to check if the account with that username exists.
		if ($stmt = $con->prepare('SELECT id, uuid, instance, email, password, role_admin_id, status FROM admin WHERE email=? and status = 1')) {
			// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
			$stmt->bind_param('s', $_POST['username']);
			$stmt->execute();
			$stmt->store_result();
			
			
			// Store the result so we can check if the account exists in the database.
			if ($stmt->num_rows < 0) {
				// Application already exists
				header('Location: ../../akses-nakes.php#falsecred');
			} else {
				$stmt->bind_result($id, $uuid, $instance, $email, $password, $role_admin_id, $status);
				$stmt->fetch();
				if (password_verify($_POST['password'], $password)) {
					
					session_start();// Verification success! User has logged-in!
					// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
					session_regenerate_id();
					$_SESSION['loggedin-psp'] = FALSE;
					$_SESSION['loggedin-nakes'] = FALSE;
					$_SESSION["uuid"] = $uuid;
					$_SESSION["instance"] = $instance;
					$_SESSION["email"] = $email;
					
					$findrole = $con->prepare("SELECT role_name FROM role_admin WHERE id = $role_admin_id");
					$findrole->execute();
					$findrole->store_result();
					$findrole->bind_result($rolename);
					$findrole->fetch();
					
					$_SESSION["role_admin"] = $rolename;
					
					if ($role_admin_id == 1) {
						$_SESSION['loggedin-psp'] = TRUE;
						// login sukses, alihkan ke halaman timeline
						header('Location: ../index-psp.php');
					}
					if ($role_admin_id == 2) {
						$_SESSION['loggedin-nakes'] = TRUE;
						// login sukses, alihkan ke halaman timeline
						header('Location: ../index-nakes.php');
					}
					
				} else {
					header('Location: ../../akses-nakes.php#falsecred');
				}
			}
		} else {
			// Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
			$con->close();
			$stmt->close();
			echo 'Could not prepare statement!';
		}
   }
   
   function get_list_datatable_klinik()
   {
      global $con;      
	   // fetch records
		//$query = $con->query('SELECT a.uuid ,a.fullname, b.branchname, c.rolename, CASE WHEN a.isactive > 0 THEN "Active" ELSE "Deactive" END AS                  status FROM user as a JOIN branch as b ON b.id=a.branch_id JOIN role as c ON c.id=a.role_id;');

		$query = $con->query('SELECT uuid , instance, address, phone, email, CASE WHEN status > 0 THEN "Active" ELSE "Deactive" END AS status FROM admin where role_admin_id = 2');

		while($row = mysqli_fetch_object($query)) {


		    $array[] = $row;
		}
     	$query->close();

		if(!isset($array)){
			$dataset = array(
			    "echo" => 1,
			    "totalrecords" => 0,
			    "totaldisplayrecords" => 0,
			    "data" => []
			);
			echo json_encode($dataset);
		} else {
			$dataset = array(
			    "echo" => 1,
			    "totalrecords" => count($array),
			    "totaldisplayrecords" => count($array),
			    "data" => $array
			);
			echo json_encode($dataset);	
		}
   }

   function get_detail_klinik()
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
   
   function get_list_datatable_pasien()
   {
		global $con;      
		// fetch records
		//$query = $con->query('SELECT a.uuid ,a.fullname, b.branchname, c.rolename, CASE WHEN a.isactive > 0 THEN "Active" ELSE "Deactive" END AS                  status FROM user as a JOIN branch as b ON b.id=a.branch_id JOIN role as c ON c.id=a.role_id;');

		$query = $con->	query('SELECT b.instance , a.fullname, a.nik, a.dob, a.phone, a.email, 
								CASE WHEN a.status > 0 THEN "Active" ELSE "Deactive" 
								END AS status
								FROM user as a
								JOIN admin as b 
								ON b.uuid = a.uuid_bidan');

		while($row = mysqli_fetch_object($query)) {


		    $array[] = $row;
		}
     	$query->close();

		if(!isset($array)){
			$dataset = array(
			    "echo" => 1,
			    "totalrecords" => 0,
			    "totaldisplayrecords" => 0,
			    "data" => []
			);
			echo json_encode($dataset);
		} else {
			$dataset = array(
			    "echo" => 1,
			    "totalrecords" => count($array),
			    "totaldisplayrecords" => count($array),
			    "data" => $array
			);
			echo json_encode($dataset);	
		}
   }

   function get_list_datatable_pasien_bidan_affiliate()
   {
    	global $con;
    	$uuid = '"'.$_REQUEST['uuid'].'"';
    	$uuid = str_replace("\r\n","",$uuid);
		//$member = $_POST['phone_number'];
		//$member = 22;
		
		$query = $con->	query('SELECT b.instance , a.fullname, a.nik, a.dob, a.phone, a.email, 
								CASE WHEN a.status > 0 THEN "Active" ELSE "Deactive" 
								END AS status
								FROM user as a
								JOIN admin as b 
								ON b.uuid = a.uuid_bidan
								where a.uuid_bidan = '.$uuid.';');

		while($row = mysqli_fetch_object($query)) {


		    $array[] = $row;
		}
     	$query->close();

		if(!isset($array)){
			$dataset = array(
			    "echo" => 1,
			    "totalrecords" => 0,
			    "totaldisplayrecords" => 0,
			    "data" => []
			);
			echo json_encode($dataset);
		} else {
			$dataset = array(
			    "echo" => 1,
			    "totalrecords" => count($array),
			    "totaldisplayrecords" => count($array),
			    "data" => $array
			);
			echo json_encode($dataset);	
		}
   }

   function get_count_pasien_affiliate()
   {
    	global $con;
    	$uuid = '"'.$_REQUEST['uuid'].'"';
    	$uuid = str_replace("\r\n","",$uuid);
		//$member = $_POST['phone_number'];
		//$member = 22;
		
		$query = $con->query('SELECT count(*) as jumlah_pasien FROM `user` where uuid_bidan = '.$uuid.';');            
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

   
   function cek_pasien()
   {
    	global $con;
    	$nik = '"'.$_REQUEST['nik'].'"';
    	$nik = str_replace("\r\n","",$nik);
		//$member = $_POST['phone_number'];
		//$member = 22;
		
		$query = $con->query('SELECT a.uuid_bidan, a.uuid, a.nik, a.fullname, a.email, a.phone, b.alamat
								FROM `user` as a
								JOIN `user_detail` as b 
								ON a.uuid = b.uuid_user
								where a.nik = '.$nik.';');         
		while($row=mysqli_fetch_assoc($query))
		{
			$data = $row;
		}
		$query->close();

		if(!isset($data)){
			$result = array("data_available" => "No Data");
		}
		else {

			$new_row = array("data_available" => "Data Available");
			$resultavailable = array_merge($data, $new_row);

			$queryacceptor = $con->query('SELECT *
									FROM `user` as a
									JOIN `acceptor` as b 
									ON a.uuid = b.uuid_user
									where a.nik = '.$nik.';');         
			while($rowacceptor=mysqli_fetch_assoc($queryacceptor))
			{
				$dataacceptor = $rowacceptor;
			}
			$queryacceptor->close();

			if(!isset($dataacceptor)){
				$resultacceptor = array("data_acceptor" => "Acceptor NA");
				$result = array_merge($resultavailable, $resultacceptor);
			} else {
				$resultacceptor = array("data_acceptor" => "Acceptor Available");
				$result = array_merge($resultavailable, $resultacceptor);
			}

		}

		header('Content-Type: application/json');
		echo json_encode($result);
   }


   function get_detail_pasien()
   {
    	global $con;
    	$uuid = '"'.$_REQUEST['uuid'].'"';
    	$uuid = str_replace("\r\n","",$uuid);
		//$member = $_POST['phone_number'];
		//$member = 22;
		
		$query = $con->query('SELECT *
									FROM `user` as a
									JOIN `user_detail` as b 
									ON a.uuid = b.uuid_user
									where a.uuid = '.$uuid.';');            
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