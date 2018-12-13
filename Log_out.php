<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

echo "<script> location.href = 'http://mersey.cs.nott.ac.uk/~psxnp4/Breakbills_LogIn_v2.php'; </script>'";
?>

</body>
</html> 