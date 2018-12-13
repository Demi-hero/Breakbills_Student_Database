<?php
	$usrname = $dbasename = 'psxnp4_uni_data' ;
	$dbpassword = 'coursework' ;
	$server_name = 'mysql.cs.nott.ac.uk' ;
    		
			// Create connection
			$conn = new mysqli($server_name, $usrname, $dbpassword, $dbasename);
		    // Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
				exit;
			}		
?>

