

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head> 
   <meta charset="utf-8" />
    <link href="style_sheets/Login_styles.css" rel="stylesheet"
          type="text/css" />
    <title>Welcome to Breakbills</title>
	 <?php
    session_start();
	include "./imports/connection.php" ;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = hash(sha256, $_POST['password']); 
      $sql = "SELECT password FROM log_in WHERE username = '" .$myusername. "'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $dbpword = $row['password'];
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($dbpword === $mypassword) {
		     $_SESSION["username"] = $myusername;
			 echo "<script> location.href = 'http://mersey.cs.nott.ac.uk/~psxnp4/Student_logged_in_lp.php'; </script>'";
      }else {
         $error = "Your Login Name or Password is invalid";
      }
    }
   ?>
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
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="POST">
            <div class="imgcontainer">
                <img src="image_files\Breakbills_logo.png" alt="Avatar"
                     class="avatar" />
            </div>
            Username : <br>
            <input type="text" name="username" /><br>
            Password: <br />
            <input type="password" name="password" />
            <br>
			<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
			<br>
            <input type="submit" name="login" value="Log In" />
        </form>
    </div>
    
	<div class="container">
		 <p><a href="Breakbills_SignUp.php">New User?</a></p>
	</div>
</body>
</html>