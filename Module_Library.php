<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
	<link href="style_sheets/Student_page_style.css" rel="stylesheet"
          type="text/css" />
    <title>Breakbill's Module Catlouge</title>


</head>
<body>

<?php
 include "./imports/topnav.php" ;
 include "./imports/connection.php" ;
 echo "<div class='container'> ";
 echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
  echo "Select a school:";
  // Populate a Dropdown with the Differetn Schools
	 $schoolinfo = "SELECT * FROM schools ";
	 $sresult =  $conn->query($schoolinfo);
	 echo "<select name='school'>";
	 echo "<option><option>";
	 while ($row = $sresult->fetch_assoc()) {
		echo "<option value='" . $row['schoolID'] . "'>". $row['name'].  "</option>";
	}
	echo "</select>";
	echo '<input type="submit" name="login" value="Select" />';
    echo "</form>";	
 echo "</div>";

 // container for the table with module data when selected from the Dropdown
 echo "<div class='container'> ";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		echo "<h2> Modules </h2>";
		$moduleinfo = "SELECT m.moduleID, m.name, m.hours, m.credits, l.lastname, l.firstname FROM modules m JOIN lecturers l ON m.lecturerID = l.lecturerID WHERE m.schoolID = ". $_POST['school'] ;
		$modresults = $conn->query($moduleinfo);
		if ($modresults-> num_rows > 0) {
			
			echo"<table style=width:100%>";
			echo "<tr>" ;
			echo	"<th>Name</th>";
			echo	"<th>ID</th>";
			echo	"<th>Hours per week </th>";
			echo	"<th>Credits </th> "; 
			echo	"<th>Lecturer</th>";
			echo "<tr>" ;
			while ($row = $modresults->fetch_assoc()) {
				echo "<tr>" ;
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['moduleID']."</td>";
					echo "<td>".$row['hours']."</td>";
					echo "<td>".$row['credits']."</td>";
					echo "<td>".$row['lastname'].", ". $row['firstname']."</td>";
				echo "</tr>" ;
			}
		}else {
			echo "There are no rows";
			echo $moduleinfo;
		}
	}
 echo "</div>";
?>
</body>
</html>