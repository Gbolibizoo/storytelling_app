<?php 



$host='localhost';
$db_name='storytelling_app';
$user='root';
$password = 'oluwasetty';




$con = mysqli_connect($host,$user,$password,$db_name);

if (!$con) {
	die("FAILED TO CONNECT ".mysqli_error($con));
}


 ?>