<?php
//session_start();
require_once('../include/conn.php');
   
   if(function_exists($_GET['function'])) {
        $_GET['function']();
    }   

   function cek_user()
   {
    	global $con;
		
    	
		// Now we check if the data was submitted, isset() function will check if the data exists.
		if (!isset($_POST['nik'])) {
			// Could not get the data that should have been sent.
			echo 'Gak ada NIK';
			//header('Location: ../../akses-pengguna.php#falsecred');
		}
		// Make sure the submitted registration values are not empty.
		if (empty($_POST['nik']) ) {
			// One or more values are empty.
			echo 'Gak ada NIK';
			//header('Location: ../../akses-pengguna.php#falsecred');
		}

		// We need to check if the account with that username exists.
		if ($stmt = $con->prepare('SELECT * FROM acceptor as a JOIN user as b ON b.uuid = a.uuid_user WHERE a.nik=?')) {
			// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
			$stmt->bind_param('s', $_POST['nik']);
			$stmt->execute();
			$stmt->store_result();
			
			
			// Store the result so we can check if the account exists in the database.
			if ($stmt->num_rows < 0) {
				// Application already exists
				echo 'Belum Terdaftar';
				//header('Location: ../../akses-nakes.php#falsecred');
			} else {

		    	$nik = $_POST['nik'];
				
				$query = $con->query('SELECT * FROM acceptor as a JOIN user as b ON b.uuid = a.uuid_user WHERE a.nik = '.$nik.';');            
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

   

?>