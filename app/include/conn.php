<?php

	// Change this to your connection info.
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 'psp';
	// Try and connect using the info above.
	$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
	if ( mysqli_connect_errno() ) {
		// If there is an error with the connection, stop the script and display the error.
		exit('Failed to connect to MySQL: ' . mysqli_connect_error());
	}

   function guidv4($data = null) {
	   // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
	   $data = $data ?? random_bytes(16);
	   assert(strlen($data) == 16);

	   // Set version to 0100
	   $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
	   // Set bits 6-7 to 10
	   $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

	   // Output the 36 character UUID.
	   return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
	}

?>