<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!-- ToDo:

		Make it look nice -->
<head>
	<?php
	session_start();
	?>
    <meta charset="utf-8" />
   
    <link href="style_sheets/Student_page_style.css" rel="stylesheet"
          type="text/css" /> 
	<title><?php echo ucfirst($_SESSION["username"]) ; ?>'s information</title>
</head>
<body>
    
    

 <?php 
	 include './imports/topnav.php'; 
	 include './imports/connection.php';
	 
	 
	 echo "<h2>".ucfirst($_SESSION["username"])."'s' Personal information</h2>";
	 echo "<div>";
	 $sql = "SELECT s.lastname, s.firstname, s.age, s.courseID, s.gender, s.email, c.coursedesc, h.name FROM students AS s JOIN course AS c ON s.courseID = c.courseID JOIN housing AS h ON s.houseID = h.houseID where username ='" .$_SESSION["username"]."'";
	 $result = $conn->query($sql);
	 echo mysqli_error($conn);
	 echo "</div>";
	 if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
			echo "<table>";
			echo "<tr><th>Name</th><td>".$row['lastname'].", ". $row['firstname']."</td></tr>";
			echo "<tr><th>Age</th><td>".$row['age']."</td></tr>";
			echo "<tr><th>Gender</th><td>".$row['gender']."</td></tr>";
			echo "<tr><th>Course</th><td>".$row['coursedesc']."</td></tr>";
			echo "<tr><th>Email</th><td>".$row['email']."</td></tr>";
			echo "<tr><th>Accommodation</th><td>".$row['name']."</td></tr>";
			echo "</table>";
		}
	 }


	 echo "<h2>".ucfirst($_SESSION["username"])."'s' Module information</h2>";
	 echo "<div class='container'>";
	 $sql = "SELECT m.name, m.hours, m.credits, e.total_mark, l.lastname, l.firstname FROM modules AS m JOIN enrolment AS e ON m.moduleID = e.moduleID JOIN lecturers as l ON m.lecturerID = l.lecturerID WHERE e.username ='" .$_SESSION["username"]. "'";
	 $result = $conn->query($sql);
	 echo"<table style='width:100%'>";
	 echo "<tr>" ;
	 echo	"<th>Name</th>";
	 echo	"<th>Hours per week </th>";
	 echo	"<th>Credits </th> ";
	 echo	"<th>Lecturer</th>";
	 echo	"<th>Total Mark </th>"; 
	 echo "<tr>" ;
	 if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
		echo "<tr>" ;
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['hours']."</td>";
			echo "<td>".$row['credits']."</td>";
			echo "<td>".$row['lastname'].", ". $row['firstname']."</td>";
			echo "<td>".$row['total_mark']."</td>"; 
		echo "</tr>" ;
		}
	 }else{
	 echo "Not enrolled on any modules";
	 }
	 ;
	 echo "</table>";
	
 ?>
	</div>
</body>
</html>