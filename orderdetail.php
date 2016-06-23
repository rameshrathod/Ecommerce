<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `order_details` ";
$result = $conn->query($sql) or die("query failed");
	echo "<table border ='1'>";
	echo "<tr>";
	echo "<th>order_id</th><th>product_ids</th><th>quantities</th><th>prices</th><th>discounts</th><th>customer_order_time</th><th>admin_confirm_time</th><th>order_dispatch_time</th><th>order_delivery_time</th><th>order_canceled_time</th><th>order_returned_time</th><th>order_status</th><th>payment_mode</th><th>payment_status</th>";
	echo "</tr>";
 
if ($row = $result->fetch_assoc()) {
	
    // output data of each row
	
	echo "<tr>";
	echo "<td>".$row['order_id']."</td><td>".$row['product_ids']."</td><td>".$row['quantities']."</td><td>".$row['prices']."</td><td>".$row['discounts']."</td><td>".$row['customer_order_time']."</td><td>".$row['admin_confirm_time']."</td><td>".$row['order_dispatch_time']."</td><td>".$row['order_delivery_time']."</td><td>".$row['order_canceled_time']."</td><td>".$row['order_returned_time']."</td><td>".$row['order_status']."</td><td>".$row['payment_mode']."</td><td>".$row['payment_status']."</td></br>";
	echo "</tr>";

    
} else {
    echo "0 results";
}
$conn->close();
?>