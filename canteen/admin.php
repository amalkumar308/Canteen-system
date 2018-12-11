<?php
session_start();
$con=mysqli_connect("localhost","root","","db2017ca07");
if(!$con)
{
	exit();
}
if(isset($_POST['login']))
{
$adminid=$_POST['adminid'];
$pass =$_POST['pass'];
$q="select * from admin where id='$adminid' && password='$pass'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
	$_SESSION['adminname']=$adminid;
	header('location:manipulateitem.php');
}
else
{
	echo "use right id and password";
	//header('location:admin.php');
}
}
?>
<html>
<head>
	<title>admin page</title>
	<style>
	#mydiv{
		width:340px;
		height:380px;
		background-color:white;
		margin-top:10%;
		margin-left:40%;
		border-style:solid;
		border-color:black;
		border-radius:12px;
	}
	p,input{
	margin-left:25px;
	}
	</style>
		
</head>
<body style="background-image: radial-gradient(red, green, blue);">
	<div id="mydiv">
		<div style="background-color:purple;height:16%;width:343px;margin-top:-18px;border-top-left-radius:12px;border-top-right-radius:12px;">
		
		<h1 style="color:white;font-size:25px;margin-left:27%;">Admin Login</h1>
		</div>
		<form action="admin.php" method="post">
		<p>Admin Id:</p>
		<input type="number" name="adminid" placeholder=" Admin Id" required>
		<p>Password:</p>
		<input type="password" name="pass" placeholder="password" required></br></br>
		<input type="radio" name="radio" value="Remenber Me">Remember Me &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">forgot password </a><br>
		
		<input type="submit" name="login" value="LOGIN" style="margin-top:15px;background-color:purple;width:300px;height:40px;background-color:green">
		</form>
		
	</div>
</body>
</html>	