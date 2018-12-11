<?php
session_start();
$con=mysqli_connect('localhost','root','','db2017ca07');
if($con)
{
	echo "connection successful";
}
else
{
	echo"connection failed";
}
$regno=$_POST['userid'];
$pass=$_POST['pass'];
$q="select * from user where reg_no='$regno' && password='$pass'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
	$_SESSION['username']=$regno;
	header('location:website2.php');
}
else
{
	header('location:logsig.php');
}
?>