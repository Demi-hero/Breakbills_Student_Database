<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
	<link href="style_sheets/Student_page_style.css" rel="stylesheet"
          type="text/css" />
    <title>Enrolment Changes</title>
<?php
	/*if($_SERVER["REQUEST_METHOD"] == "POST" & $_POST['edit'] == 'Enrole'){
		if(!empty($_POST['module[]'])){
			foreach($_POST['module[]'] as $insert) {
				echo $insert ;
			}
		}
		// $insert = "INSERT INTO enrolment VALUE ('".$_SESSION["username"]."','".
	}elseif($_SERVER["REQUEST_METHOD"] == "POST" & $_POST['edit'] == 'Derole') {
		echo "<title>Derolment fired</title>";
}*/
?>

</head>
<body>
<?php 
include "./imports/topnav.php";
include "./imports/connection.php";


echo "<div class='container'>"; 
// logic to inset or delete from my DB 
if($_SERVER["REQUEST_METHOD"] == "POST" & $_POST['edit'] == 'Enrole'){
		$module = $_POST['module'];
		if(!empty($module)) {
			foreach($module as $value) {
				$insert = "INSERT INTO enrolment (username, moduleID) VALUE ('".$_SESSION["username"]."',".$value.")";
				$conn->query($insert);
				echo "<script> location.href = 'http://mersey.cs.nott.ac.uk/~psxnp4/Student_logged_in_lp.php'; </script>'";
			}
		}
}elseif ($_SERVER["REQUEST_METHOD"] == "POST" & $_POST['edit'] == 'Derole') {
	$module = $_POST['module'];
		if(!empty($module)) {
			foreach($module as $value) { 
				$delete = "DELETE FROM enrolment WHERE username ='".$_SESSION["username"]."' AND moduleID = ".$value;
				$conn->query($delete);
				echo "<script> location.href = 'http://mersey.cs.nott.ac.uk/~psxnp4/Student_logged_in_lp.php'; </script>'";
			}
		}
}

// create the filter for the top of the page. 
 echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
  echo "Filter on a school:";
  // Populate a Dropdown with the Differetn Schools
	 $schoolinfo = "SELECT * FROM schools ";
	 $sresult =  $conn->query($schoolinfo);
	 echo "<select name='school'>";
	 echo "<option></option>";
	 echo "<option value= 0>All</option>";
	 while ($row = $sresult->fetch_assoc()) {
		echo "<option value='" . $row['schoolID'] . "'>". $row['name'].  "</option>";
	}
	echo "</select>";
	echo '<input type="submit" name="Select" value="Select" />';
    echo "</form>";	
 echo "</div>"; 

 echo "<div class ='container'>";
 echo "<form method='post' action=".htmlspecialchars($_SERVER['PHP_SELF']).">";
 echo "<table style='width:100%'>";
 echo "<tr><th>Module ID</th><th>Name</th><th>Hours per week</th><th>Credits</th><th>Lecturer</th><th>Selection</th>";
 if ($_SERVER["REQUEST_METHOD"] == "POST" & $_POST['school'] > 0){
	
	$moduleinfo = "SELECT * FROM modules as m JOIN lecturers AS l ON m.lecturerID = l.lecturerID WHERE m.schoolID = ".$_POST['school'];
	
	$mresult = $conn->query($moduleinfo);
	while ($row = $mresult->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row['moduleID']."</td><td>".$row['name']."</td><td>".$row['hours']."</td><td>".$row['credits']."</td><td>".$row['lastname'].", ". $row['firstname']."</td><td><input type='checkbox' name='module[]' value=".$row['moduleID']."></td>";
		echo "</tr>";
		$x++;
	}
	
 }else{
	echo "<div class ='container'>";
	$moduleinfo = "SELECT * FROM modules AS m JOIN lecturers AS l ON m.lecturerID = l.lecturerID";
	$mresult = $conn->query($moduleinfo);
	while ($row = $mresult->fetch_assoc()){
		echo"<tr><td>".$row['moduleID']."</td><td>".$row['name']."</td><td>".$row['hours']."</td><td>".$row['credits']."</td><td>".$row['lastname'].", ". $row['firstname']."</td><td><input type='checkbox' name='module[]' value=".$row['moduleID']."></td></tr>";
	}
 }
 echo "</table>";
echo "<input type='submit' name = 'edit' value='Enrole'/> &nbsp &nbsp &nbsp";
echo "<input type='submit' name = 'edit' value='Derole'/>";

echo "</form>";
echo "</div>";
?>
</body>
</html>