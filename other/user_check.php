<?php

include '../database/database.php';

$userId=$_POST['uid'];
$pass=$_POST['upass'];
var_dump($userId);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)

{
	die("Connection failed: " . $conn->connect_error);
}

function  toString($userId)
{
	return $userId;
	
}
$email="email_id="."'$userId'.";
$mobile="mobile_no=$userId";
$sql_query ="select * from login where ".$email;
//$sql_query = "select * from login where email_id=".$userId;
echo $sql_query;
//echo "<br>select * from login where ((email_id=\"$userId\")or(mobile_no=$userId))and(password=\"$pass\")";

$result = $conn->query($sql_query);
var_dump($result);


	

?>

