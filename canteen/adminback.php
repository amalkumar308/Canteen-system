<?php
session_start();
$con=mysqli_connect("localhost","root","","db2017ca07");
if($con)
{
	echo "connection set";
}
else
{
	echo "connection failed";
}
$adminid=$_POST['adminid'];
$pass =$_POST['pass'];
$q="select * from admin where id='$adminid' && password='$pass'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
	header('location:manipulateitem.php');
}
else
{
	header('location:admin.php');
}
?>