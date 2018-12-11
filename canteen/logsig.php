<?php
session_start();
$con=mysqli_connect('localhost','root','','db2017ca07');
if(!$con)
{
	exit();
}
if(isset($_POST["login"]))
{
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
			echo "<script>alert('username and password do not exist');</script>";
			//header('location:logsig.php');
		}

}
else
{
	if(isset($_POST["signup"]))
	{
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
		//header('location:logsig.php');
	}
	else
	{
		$q="select * from user where reg_no='$regno'";
		$result=mysqli_query($con,$q);
		$num=mysqli_num_rows($result);
		if($num==1)
		{
			//header('location:logsig.php');
			echo "user already exist";
		}
		else
		{
			$qy="insert into user(name,reg_no,password,mobile,hostal_name,room_no,lname,confirmpass)
			values('$fname','$regno','$pass','$mobno','$hosname','$roomno','$lname','$conpass')";
			mysqli_query($con,$qy);
			header('location:logsig.php');
		}
	}
	}
}
?>
<html>
<head>
	<title>login and sign up page</title>
	<style>
		#mydiv{
			border-style:solid;
			border-color:red;
			width:320px;
			height:420px;
			background-color:black;
			margin-top:10%;
			margin-left:40%;
			position:absolute;
			}
		.button
		{
		margin-top:10%;
		margin-left:30%;
		border-radius:12px;
		}
	</style>
	<script>
	function signup1()
	{
	document.getElementById("mydiv").style.height = "910px";
	document.getElementById("form1").style.display="none";
	document.getElementById("form2").style.display="inline";
	}	
	function login1()
	{
	document.getElementById("mydiv").style.height = "420px";
	document.getElementById("form2").style.display="none";
	document.getElementById("form1").style.display="inline";
	}
   </script>	

</head>
<body style="background-image: radial-gradient(red, green, blue);">

	<div id="mydiv">
	<center><img src="login.jpg" alt="loginlogo" style="width:100px;height:100px;margin-top:-50px;border-radius:50%;"></center>
		<input class="button" type="button" name="button" value="Login" style="width:70px;height:35px;" onclick="login1()" >&nbsp;&nbsp;&nbsp;
		<input type="button" name="button" value="Sign Up" style="width:70px;height:35px;border-radius:12px;" onclick="signup1()">
	<form style="display:inline" id="form1" method="post" action="logsig.php">
		<p style="color:white;margin-left:10%;">Registration No.</p>
		<input type="text" name="userid" placeholder="Registration No.Or Phone" style="margin-left:10%;" required>
		<p style="color:white;margin-left:10%;">Password</p>
		<input type="password" name="pass" placeholder="Password" style="margin-left:10%;" required></br>
		<center><input type="submit" name="login" value="LOGIN" style="margin-top:8%;width:70px;height:35px;border-radius:12px;"></center>
		<a href="#">forget your password</a>
	</form>
	<form id="form2" style="display:none"  method="post" action="logsig.php">
		<p style="color:white;margin-left:10%;">Enter First Name</p>
			<input type="text" name="fname" placeholder="Enter First Name" style="margin-left:10%;" required>
		<p style="color:white;margin-left:10%;">Enter Last Name</p>
			<input type="text" name="lname" placeholder="Enter Last Name" style="margin-left:10%;" required>
		<p style="color:white;margin-left:10%;">Registration No.</p>
			<input type="text" name="regno" placeholder="Registration No." style="margin-left:10%;" required>
		<p style="color:white;margin-left:10%;">Enter Mobile No.</p>
			<input type="number" name="mobno" placeholder="Enter Mobile No." style="margin-left:10%;" required>
		<p style="color:white;margin-left:10%;">Password</p>
			<input type="password" name="pass" placeholder="**********" style="margin-left:10%;" required>
		<p style="color:white;margin-left:10%;">Confirm-Password</p>
			<input type="password" name="conpass" placeholder="**********" style="margin-left:10%;" required>
		<p style="color:white;margin-left:10%;">Address</p>
		<p style="color:white;margin-left:10%;">Hostal Name</p>
			<input type="text" name="hostalname" placeholder="Hostal Name" style="margin-left:10%;" required>
		<p style="color:white;margin-left:10%;">Room No.</p>
			<input type="text" name="roomno" placeholder="Room No." style="margin-left:10%;" required><br><br>
		</br>
		<center><input type="submit" name="signup" value="SIGN UP" style="margin-top:8%;width:70px;height:35px;border-radius:12px;"></center>
	</form>
	</div>
</body>
</html>
	