<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:logsig.php');
}
?>
<html>
<head>
	<title> Canteen Managment System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		ul
		    {
	       margin:0;
		   list-style-type:none;		   
		    }
		li  {
			float:right;
			}
		li a{  
				background-color:#A9A9A9;
				font-size:26px;
				color:black;
				text-decoration:none;
				margin :10px;
			}
		a.hover
		    {
			background-color:white;
			}
			
	</style>
</head>
<body style="background-image:url('ashu.jpg');background-size:80% 75%">
	<div style="background-color:black; margin-top:-0.6%;width:101.3%;margin-left:-9px;border-bottom-left-radius:12px;height:5%;border-bottom-right-radius:12px;"><p style="display:inline;color:white;">Toll-Free-Number :7240119919</p>
	&nsbp;&nsbp;&nsbp;<p style="color:white;display:inline;">ashujain36196@gmail.com</p>&nsbp;&nsbp;&nsbp;&nsbp;&nsbp;&nsbp;&nsbp;&nsbp;&nsbp;&nsbp;
	<a href="logout.php" target="_top" >LOGOUT</a>&nsbp;&nbsp;&nsbp;
	<a href="admin.php" target="_blank">ADMIN</a>
	</div>
	<h1 style="color:black;"> WELCOME <?php echo $_SESSION['username']; ?></h1>
	<h1 style="font-size:40px;margin:-75px;"><center>MNNIT CANTEEN</center></h1>
	<ul>
		<li style="margin-top:85px;"><a href="contactus.php" target="_blank">Contact us</a><li>
		<li style="margin-top:85px;"><a href="foodgallery.php" target="_blank">Food Gallary</a></li>
		<li style="margin-top:85px;"><a href="aboutus.php" target="_blank">About us</a></li>
		<li style="margin-top:85px;"><a href="website2.php">Home</a></li>	
	</ul><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div>
	<h3>IMPORTANT:</h3>
	<marquee width="80%" direction="left" height="30%" style="color:red;">
	Product return is not allowed, <br>
	but if you get expired/opened Product then you call on <br>
	toll free number 7240119919 and we will provide fresh product <br>
		Start Time :11(morning)</br>
		Close Time :2 (night)
	</marquee>
	<div>	
</body>
</html>