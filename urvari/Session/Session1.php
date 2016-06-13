<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php

// Set session variables
$_SESSION['timeout'] = time();
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
$field=$_SESSION["favcolor"] ;
?>

</body>
</html>