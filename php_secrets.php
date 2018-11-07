<?php
$name = psxnp4_uni_data
$password = h!l!ghtMEplz2
$server_name = mysql.cs.nott.ac.uk


function passwordcheck($database,$givenpword,$userID)
    $password_comp = "SELECT passwrd FROM loginin 
	                  INNER JOIN students ON students.studentID = login.studentID
					  where studentID = '" .$userID. "'"
	$password_line = $db->query($password_comp);
	$intermidiate = $password_line->fetch_assoc();
	$comparitor = $intermidiate['passwrd']
	if ($givenpword = $comparitor) {
	    /* send them to the log in page */
		header("Location: http://mersey.cs.nott.ac.uk/~psxnp4/Student_logged_in_lp.php"); 
		exit();
}	else 
		/* Redirect browser back to the login page */
		header("Location: http://mersey.cs.nott.ac.uk/~psxnp4/Breakbills_LogIn.php"); 
		exit();


?>

