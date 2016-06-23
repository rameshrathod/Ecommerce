
<link rel='stylesheet' type='text/css' href='css/temp.css'><script src='valid.js'></script>
<?php
include_once 'database/DB.php';
include_once 'productWork/PageInit.php';

//create obj of DB
$db1=new DB();
//geting connection to mysql
$db1->getConnection();
//get records from db using method by passing table name,coulmn array,order and order column
$records=$db1->MainCategaries('prooduct_categories');
//$records1=$db1->subCategaries('prooduct_categories');

//create obj of pageInit
$p1=new PageInit();
//call method to display records by passing records,per page count and requested page no
$cats=$p1->MainCategaryDisplay($records);
//$p1->subCategaryDisplay($records1);
$db1->closeConnection();
?>