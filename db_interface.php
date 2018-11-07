<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link href="DB_styles.css" rel="stylesheet"
          type="text/css" />
    <style>
        table, th, td {
            border: 1px solid black;
            color: floralwhite;
        }

            table.MsoTableGrid {
                border: solid windowtext 1.0pt;
                font-size: 11.0pt;
                font-family: "Calibri",sans-serif;
            }

        p.MsoNormal {
            margin-top: 50cm;
            margin-right: 0cm;
            margin-bottom: 8.0pt;
            margin-left: 0cm;
            line-height: 107%;
            font-size: 11.0pt;
            font-family: "Calibri",sans-serif;
        }

        .auto-style1 {
            width: 406px;
        }
    </style>
    <title>Breakbills Student Enrolment</title>
</head>
<body>
    <table class="center">
        <tr>
            <th colspan="7">Student Data Input</th>
        </tr>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last name</th>
            <th>Course ID</th>
            <th>Grade</th>
            <th>Fees Payed</th>
            <th>Year</th>
         </tr>
        <tr>
            <td><input name="number1id" type="number" /></td>
            <td><textarea name="name1">John</textarea></td>
            <td><textarea name="name2">Doe</textarea></td>
            <td><input type="number" name="courseid" /></td>
            <td><input type="hidden" /> </td>
            <td><input type="hidden" /> </td>
            <td><input type="hidden" /> </td>
            </td>
         </tr>
         <tr>
             <td colspan="7"><input type="submit" value="Save Data" /></td>
         </tr>
     </table>

</body>
</html>