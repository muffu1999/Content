<?php 
$db_local='localhost';
$db_user='root';
$db_pass='';
$db_database='cms';


$con=mysqli_connect($db_local,$db_user,$db_pass,$db_database);
if(!$con)
{
  die(mysqli_error());  
}

?>