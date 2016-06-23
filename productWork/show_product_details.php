<?php
include_once 'database/DB.php';
include_once 'PageInit.php';

if (!isset($_GET['pid']))
{
	$pid='';
}
else{
	$pid=$_GET['pid'];
}
//create obj of DB
$db=new DB();
//geting connection to mysql
$db->getConnection();
//get records from db using method by passing table name,coulmn array,order and order column
$records=$db->fetchProductDetails('product_details',$pid);
//close connectiobn
$db->closeConnection();

//create obj of pageInit
$p=new PageInit();
//call method to display records by passing records,per page count and requested page no
$p->dispProductDetails($records);