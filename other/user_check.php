<?php

include '../database/database.php';

		$userId=$_POST['uid'];
		$pass=$_POST['upass'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)

{
	die("Connection failed: " . $conn->connect_error);
}
else 
{
		if(!is_numeric($userId))//login via email id
		
		{
			$sql_query="select * from login where email_id=\"$userId\" and password=\"$pass\"";
			
		}
	
		 else if(is_numeric($userId))//login via mobile no
		{
			
		$sql_query="select * from login where mobile_no=$userId and password=\"$pass\"";
				
		
		}

	$result = $conn->query($sql_query);//sql query fired
	if($result->num_rows>0)
	{
		while ($row =$result->fetch_assoc())//result taken into row
			{
		
						if($row['categary']=="user")//categary is checked
						{
							session_start();
							$_SESSION['timeout'] = time();
							$_SESSION["user_id"] =$row['user_id'];
							$_SESSION["categary"] =$row['categary'];
							header('Location:../user/home.php');//redirected to user logged in page.
						}
						else if($row['categary']=="admin")//categary is checked
						{
							session_start();
							$_SESSION['timeout'] = time();
							$_SESSION["user_id"] =$row['user_id'];
							$_SESSION["categary"] =$row['categary'];
							header('Location:../admin/Home.php');//redirected to admin logged in page.
						}
				
			}
		
	}
	else 
	{
		echo "wrong user id or password <br>";//login failed
		echo '<a href="../index.php">click here to login</a>';//on click goes to index.php
		
	}	
	
mysqli_close($conn);
}	

?>

