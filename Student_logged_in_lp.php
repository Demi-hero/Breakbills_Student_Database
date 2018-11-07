<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
   
    <link href="style_sheets/Student_page_style.css" rel="stylesheet"
          type="text/css" /> 
	<title><?php echo $_POST["StudentID"] ; ?>'s information</title>
</head>
<body>
    <div class="topnav">
        <div class="flex-container">
            <div style="flex-grow:1">
                <h2>Brakebills College for Magical Pedagogy</h2>
                <?php echo $_POST["StudentID"]; ?><br />
            </div>
            <div style="flex-grow:2">
                <ul>
                    <li><a href="Student_logged_in_lp.html">Home</a></li>
                    <li><a href="Student_logged_in_lp.html">My Modules</a></li>
                    <li><a href="Student_logged_in_lp.html">Module Library</a></li>
                    <li><a href="Student_logged_in_lp.html">Edit Enrolment</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <button type="button" onclick="alert('Your Modules will Go Here')">What are my Modules</button>
        <button type="button" onclick="alert('Module Selection will go Here')">Change your Modules</button><br />
    </div>
    
    <div class="container">
        <button type="button" onclick="alert('Modules Offered will go here ')">Module Catalouge</button>
        <button type="button" onclick="alert('Other Stuff Will go here')">Other Stuff</button>
		

    </div>
</body>
</html>