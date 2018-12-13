<!DOCTYPE html>		
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
		<p> We see you seek knowledge no matter what is in your way </p>
        <p> Welcome Apprentice to the enrolment process</p>
        <p> Please fill in the form below</p>
        <p> All Feilds are manditory</p>
    </div>
  <?php
	// define variables and set to empty values
	$nameErr = $unameErr = $pwErr = $genderErr = $userErr = $ageErr = $emailErr = $courseErr = "";
	$lastname = $firstname = $password = $gender = $username = $age = $email = $courseID = "";
	// defnine the function to clean input
	function test_input($data) {
	 $data = trim($data);
	 $data = stripslashes($data);
	 $data = htmlspecialchars($data);
	 return $data;
    }
	// what happens when the form is posted back to the page
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// each if checks a manditory variable and sets its error
		// this logic was found in an online tutorial at coding cage
		if (empty($_POST['course'])) {
			$courseErr = "Course is required";
		} else {
			$courseID = test_input($_POST['course']);
		}
		
		if (empty($_POST['Boarding House'])) {
			$courseErr = "Housing is required";
		} else {
			$houseID = test_input($_POST['Boarding House']);
		}

		if (empty($_POST["username"])) {
			$unameErr = "Username is required";
		} else {
			$username = test_input($_POST["username"]);
		}
		
		if (empty($_POST["lastname"])) {
			$nameErr = "Name is required";
		} else {
			$lastname = test_input($_POST["lastname"]);
		}

		if (empty($_POST["firstname"])) {
			$nameErr = "Name is required";
		} else {
			$firstname = test_input($_POST["firstname"]);
		}

		if (empty($_POST["age"])) {
			$ageErr = "Age is required";
		} else {
			$age = test_input($_POST["age"]);
		}

		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
		}

		if (empty($_POST["password"])) {
			$pwErr = "Password is required";
		} else {
  			$password = test_input($_POST["password"]);
		}

		if (empty($_POST["password_confirm"])){ 
			$pwErr = "Password is required";
		} elseif (test_input($_POST["password_confirm"]) <> test_input($_POST["password"])) {
			$pwErr = "Passwords do not match";
		} else {
  			$upassword = hash(sha256, test_input($_POST["password_confirm"]));
		}

		if (empty($_POST["gender"])) {
			$genderErr = "Gender is required";
		} else {
			$gender = test_input($_POST["gender"]);
		}
		
		
		
		if ($nameErr == "" && $unameErr == "" && $pwErr =="" && $genderErr == "" && $userErr =="" && $ageErr == "" && $emailErr == "") {
			
			include "./imports/connection.php";

			$check = "SELECT * FROM students WHERE username = '".$username."'" ;
			$stuinsert = "INSERT INTO students VALUES ('" .$username."','" .$lastname."','".$firstname."','".$age. "','".$courseID ."','".$gender."','".$email."','".$houseID."')";
			
			$lginsert = "INSERT INTO log_in VALUES ('" .$username."','" .$upassword."')";
			$result = $conn->query($check);

			if ($result->num_rows == 0) {
				if ($conn->query($stuinsert)) {
					if ($conn->query($lginsert)){
						$conn->close();
						echo "<script> location.href = 'http://mersey.cs.nott.ac.uk/~psxnp4/successful_account_creation.php'; </script>'";
						exit ; 
					} else {
						echo "Failed to add your password please contact a system administrator using telepathy";
					}
				} else {
					echo "Please select a course of study";
				}
			} else {
			echo "<div class='container'> <p>The username supplied already exists</p></div>";
			}
		}else {
			echo "<div class='container'> <p>There was an error with your form please try again.</p></div>";
		} 
  }
?>


<div class='container'>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Desired Course:
  <?php
	include "./imports/connection.php";

	 $courseinfo = "SELECT * FROM course ";
	 $ciresult =  $conn->query($courseinfo);
	 
	 echo "<select name='course'>";
	 echo "<option><option>";
	 while ($row = $ciresult->fetch_assoc()) {
		echo "<option value='" . $row['courseID'] . "'>". $row['coursedesc'] . "(" .$row['coursecode'].  ")</option>";
	}
	echo "</select>";
	echo "<br><br>";

	$houseinfo = "SELECT * FROM housing ";
	 $ciresult =  $conn->query($houseinfo);

	echo "Boarding House: ";
	echo "<select name='Boarding House'>";
	 echo "<option><option>";
	 while ($row = $ciresult->fetch_assoc()) {
		echo "<option value='" . $row['houseID'] . "'>". $row['name'] ."</option>";
	}
	echo "</select>";
   ?>
   <br><br>
  Username: <br>
  <input type="text" name="username">
  <span class="error"> <?php echo "<br>".$unameErr;?></span>
  <br>
  Password:<br>
  <input type="password" name="password">
  <span class="error"> <?php echo "<br>".$pwErr;?></span>
  <br>
  Re-enter your Password:<br>
  <input type="password" name="password_confirm">
  <span class="error"> <?php echo "<br>".$pwErr;?></span>
  <br>
  First Name: <br>
  <input type="text" name="firstname">
  <span class="error"> <?php echo "<br>".$nameErr;?></span>
  <br>
  Last Name: <br>
  <input type="text" name="lastname">
  <span class="error"> <?php echo "<br>".$nameErr;?></span>
  <br>
  Age: <br>
  <input type="number" name="age">
  <span class="error"> <?php echo "<br>".$ageErr;?></span>
  <br>
  Gender:
  <input type="radio" name="gender" value="Female">Female
  <input type="radio" name="gender" value="Male">Male
  <input type="radio" name="gender" value="Other">Other
  <span class="error"> <?php echo $genderErr;?></span>
  <br><br>
  Email:<br>
  <input type="text" name="email">
  <span class="error"> <?php echo "<br>".$emailErr;?></span>
  <br>
  
  <input type="submit" name="submit" value="Submit">  
</form>
</div>   
</body>
</html>
