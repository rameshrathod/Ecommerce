
<link rel='stylesheet' type='text/css' href='css/temp.css'><script src='valid.js'></script>
<?php
include 'database/DB.php';
include 'productWork/PageInit.php';

//create obj of DB
$db1=new DB();
//geting connection to mysql
$db1->getConnection();
//get records from db using method by passing table name,coulmn array,order and order column
$records=$db1->MainCategaries('product_categaries');

$db1->closeConnection();

//create obj of pageInit
$p1=new PageInit();
//call method to display records by passing records,per page count and requested page no
$p1->MainCategaryDisplay($records);


?>