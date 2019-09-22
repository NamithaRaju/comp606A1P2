<?php
 
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='';
$database='booking';

$db=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$database);
if ($db == false){
    header("location: sitedown.php");
  }

?>