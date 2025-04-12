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
		if ($stmt = $con->prepare('SELECT id, uuid, uuid_bidan, fullname, nik, phone, email, password FROM user WHERE phone=? or email=? or nik=?')) {
			// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
			$stmt->bind_param('sss', $_POST['username'], $_POST['username'], $_POST['username']);
			$stmt->execute();
			$stmt->store_result();
			
			
			// Store the result so we can check if the account exists in the database.
			if ($stmt->num_rows < 0) {
				// Application already exists
				header('Location: ../../akses-pengguna.php#falsecred');
			} else {
				$stmt->bind_result($id, $uuid, $uuid_bidan, $fullname, $nik, $phone, $email, $password);
				$stmt->fetch();
				if (password_verify($_POST['password'], $password)) {
					// buat Session

/*
					$query = $con->query('SELECT * FROM `admin` where uuid = '.$uuid_bidan.';');            
					while($row=mysqli_fetch_object($query))
					{
						$data =$row;
					}
*/

			    	$uuidcek = '"'.$uuid_bidan.'"';
			    	$uuidcek = str_replace("\r\n","",$uuidcek);

			    	$query = $con->query('SELECT * FROM `admin` where uuid = '.$uuidcek.';');            
					while($row=mysqli_fetch_array($query))
					{
						$data =$row;
					}
					/*
					$findbidan = $con->prepare("SELECT instance FROM admin WHERE uuid = $uuidcek");
					$findbidan->execute();
					$findbidan->store_result();
					$findbidan->bind_result($instance);
					$findbidan->fetch();
					*/

					session_start();// Verification success! User has logged-in!
					// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
					session_regenerate_id();
					$_SESSION['loggedin'] = TRUE;
					$_SESSION["uuid_user"] = $uuid;
					$_SESSION["fullname"] = $fullname;
					$_SESSION["bidan_wa"] = $data['phone'];
					$_SESSION["bidan_affiliate"] = $data['instance'];
					$_SESSION["bidan_address"] = $data['address'];
					// login sukses, alihkan ke halaman timeline
					
					header('Location: ../index.php');
				} else {
					header('Location: ../../akses-pengguna.php#falsecred');
				}
			}
		} else {
			// Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
			$con->close();
			$stmt->close();
			echo 'Could not prepare statement!';
		}
   }

?>