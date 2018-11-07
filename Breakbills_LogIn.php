<!DOCTYPE html>
<?php  if(isset($_POST["Login"))
	    include("php_secrets");
	    /* create a connection to my database using the variables in php_secrets and kill it if it errors*/
		$db = mysqli_connect($server_name,$name,$password,$name) ;
	    if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);}
		
		// sanitise the posted user input a little bit
	    $username= mysqli_real_escape_string($db,$_POST['username']);
	    $mypassword = hash('sha256', mysqli_real_escape_string($db,$_POST['password']));

		// fetches the user data and then puts that data in a variable 
	    $userexists = "select * from students where username = '" .$username. "'";
	    $proofofexistance = $db->query($userexists);
	    
		if ($proofofexistance -> num_rows = 1) {
			// if only one line comes back it then checks the password against an imported function
			$intermidiate = $proofofexistance->fetch_assoc();
	        $userID = $intermidiate['studentID'] ;
		    passwordcheck($db,$mypassword,$userID) ;
	    }else {
		    /* Redirect browser back to the login page */
		    header("Location: http://mersey.cs.nott.ac.uk/~psxnp4/Breakbills_LogIn.php"); 
		    exit();
		} 
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link href="style_sheets/Login_styles.css" rel="stylesheet"
          type="text/css" />
    <title>Welcome to Breakbills</title>
</head>
<body>
    <div class="topnav">
        <h2> Brakebills College for Magical Pedagogy </h2>
    </div>
    
    
    <div class="container">
        <p> For those of you who found this website without forknowledge do not fear</p>
        <p> Someone will be along shortly to remedy the situation</p>
        <p> Current students please log in below</p>
        <br>
    </div>
    
    
    <div class="container">
        <form action="" method="POST">
            <div class="imgcontainer">
                <img src="image_files\Breakbills_logo.png" alt="Avatar"
                     class="avatar" />
            </div>
            Student ID : <br>
            <input type="text" name="username" value="username" /><br>
            Password: <br />
            <input type="password" name="password" />
            <br><br>
            <input type="submit" name="login" value="Log In" />
        </form>
    </div>
    
</body>
</html>