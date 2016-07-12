<?php
// Start the session
session_start();
?>

<?php

$userId=$_POST['uid'];
$pass=$_POST['upass'];
	
// Start the session
$_SESSION['timeout'] = time();
$_SESSION["user"] = $userId;
$_SESSION["password"] = $pass;

 if ($_SESSION['timeout'] + 1 * 60 < time()) 
 {
   // remove all session variables
   session_unset();
   // destroy the session 
   session_destroy(); 
     echo" session timed out";
	header('Location: main.php');
  } else
  {
     echo "session ok";
  }
?>


<?php
include "database.php";

		
		$sql_query="select * from login where email_id=\"$userId\" and password=\"$pass\"";
		$result = $conn->query($sql_query) or die("failed query");
		
		if ($result->num_rows > 0) {
   
			while($row = $result->fetch_assoc())
			{
				echo "email_id: " . $row["email_id"]. " - password: " . $row["password"];
				
				if($row["email_id"]==$userId && $row["password"]==$pass)
				{
					echo "login succesfully";
					header('Location:welcome.php');
				}else{
					echo "invalid user";
				}
			}
			} else {
			
			echo "<script>
			alert('invalid user');
			</script>";
				header('Location:main.php');
			}
		

		
		
?>



<?php
 if ($_SESSION['timeout'] + 1 * 60 < time()) 
 {
   // remove all session variables
   session_unset();
   // destroy the session 
   session_destroy(); 
     echo" session timed out";
	header('Location:main.php');
  } else
  {
     echo "session ok";
  }
?>



