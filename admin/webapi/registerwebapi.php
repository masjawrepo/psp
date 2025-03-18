<?php
//session_start();
require_once('../include/conn.php');
   
   if(function_exists($_GET['function'])) {
        $_GET['function']();
    }   

   function add_instance()
   {

    	global $con;
		$uuid = guidv4();
		
    	
		// Now we check if the data was submitted, isset() function will check if the data exists.
		if (!isset($_POST['instance'], 
					  $_POST['phone'],
					  $_POST['email'],
					  $_POST['address'],
					  $_POST['password'])) {
			// Could not get the data that should have been sent.
			//exit('Please complete the registration form 1'.$_POST['fullname'].$_POST['nik'].$_POST['address'].$_POST['pob'].$_POST['dob'].$_POST['phone'].$_POST['email'].$_POST['password']);
			exit('Please complete the registration form 1');
		}
		// Make sure the submitted registration values are not empty.
		if (empty($_POST['instance']) || 
			 empty($_POST['phone']) || 
			 empty($_POST['email']) || 
			 empty($_POST['address']) || 
			 empty($_POST['password']) ) {
			// One or more values are empty.
			exit('Please complete the registration form 2');
		}

		// We need to check if the account with that username exists.
		if ($stmt = $con->prepare('SELECT phone FROM admin WHERE phone = ?')) {
			// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
			$stmt->bind_param('s', $_POST['phone']);
			$stmt->execute();
			$stmt->store_result();
			// Store the result so we can check if the account exists in the database.
			if ($stmt->num_rows > 0) {
				// Application already exists
				echo 'Nomor telepon yang di Input sudah terdaftar!';
			} else {
				$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
				$isActive = 1;
				$isNakes = 2;
				if ($stmt = $con->prepare('INSERT INTO admin (uuid ,instance ,phone, email, address, password, role_admin_id, status) VALUES (?,?,?,?,?,?,?,?)')) {
					$stmt->bind_param('ssssssss', $uuid, $_POST['instance'], $_POST['phone'], $_POST['email'], $_POST['address'], $password, $isNakes, $isActive);
					$stmt->execute();
					$con->close();
					$stmt->close();
					header('Location: ../index-psp.php#success');
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

?>