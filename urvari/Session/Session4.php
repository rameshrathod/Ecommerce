<?php
session_start();
  
?>
<!DOCTYPE html>
<html>
<body>

<?php

   if ($_SESSION['timeout'] + 1 * 60 < time()) {
   // remove all session variables
   session_unset();
   // destroy the session 
   session_destroy(); 
     echo" session timed out";
	 header('Location: http://www.google.com/');
  } else {
     echo "session ok";
  }

?>

</body>
</html>