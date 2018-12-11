<?php
session_start();
$con=mysqli_connect('localhost','root','');
if($con)
{
	echo "connection sucessful";
	
}
else
{
	echo "no connection";
}
mysqli_select_db($con,'db2017ca07');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$regno=$_POST['regno'];
$mobno=$_POST['mobno'];
$pass=$_POST['pass'];
$conpass=$_POST['conpass'];
$hosname=$_POST['hostalname'];
$roomno=$_POST['roomno'];
if($pass!=$conpass)
{
	echo "passwords are not same";
	header('location:logsig.php');
}
else
{
$q="select * from user where reg_no='$regno'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
	echo "user already exist";
	header('location:logsig.php');
}
else
{
	$qy="insert into user(name,reg_no,password,mobile,hostal_name,room_no,lname,confirmpass)
	values('$fname','$regno','$pass','$mobno','$hosname','$roomno','$lname','$conpass')";
	mysqli_query($con,$qy);
	header('location:logsig.php');
}
}
?>







