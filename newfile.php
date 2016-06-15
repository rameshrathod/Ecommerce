<?php
 
$db = mysqli_connect("localhost:3306","root","root","ecommerce"); //keep your db name
$sql = "SELECT product_img FROM product_details";
$sth = $db->query($sql);
//$result=mysqli_fetch_array($sth);
while($result=mysqli_fetch_array($sth))
{
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['product_img'] ).'" height="250" width="250"/><br>';
}
?>