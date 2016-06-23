<?php
// Start the session
session_start();
?>

<?php
  // remove all session variables
   session_unset();
   // destroy the session 
   session_destroy(); 
   echo "<script>alert('logout successfully');window.location='./index.php';</script>";
	//header('Location:./index.php');

?>

