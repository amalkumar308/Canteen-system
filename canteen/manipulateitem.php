<?php
session_start();
$con=mysqli_connect('localhost','root','','db2017ca07');
if(!$con)
{
	echo "database not available";
	exit();
}
if(isset($_POST['submit']))
{
$itemid=$_POST['itemid'];
$itemname=$_POST['itemname'];
$itemrate=$_POST['itemrate'];
$availableitem=$_POST['availableitem'];
$itemweight=$_POST['itemweight'];

	$qy="insert into item(item_id,item_name,item_rate,avail_item,item_quantity_in_ml)
	values('$itemid','$itemname','$itemrate','$availableitem','$itemweight')";
if (mysqli_query($con, $qy)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $qy . "<br>" . mysqli_error($con);
}
}
?>
<html>
<head>
	<title>to manipulate items</title>
	<style>
	#mydiv
	{
		border-style:solid;
		border-color:black;
		background-color:green;
		width:500px;
		height:300px;
		margin-top:200px;
		margin-left:400px
	}
	p
	{
	margin-left:15px;
	display:inline;
	}
	</style>
</head>
<body style="background-image: radial-gradient(red, purple, blue);">
	<center><h1>WELCOME <?php echo $_SESSION['adminname']; ?></h1></center>
	<a href="logoutadmin.php" style="float:right;font-size:25px;color:white;">LOGOUT</a>
	<div id="mydiv">
	<form action="manipulateitem.php" method="post">
		<p>Item Id:</p> <input type="number" name="itemid" placeholder="Item Id"  style="margin-left:140px;" required><br></br>
		<p>Item Name:</p><input type="text" name="itemname" placeholder="Item Name"  style="margin-left:120px;" required></br></br>
		<p>Item Rate:</p><input type="number" name="itemrate" placeholder="Item Rate" style="margin-left:130px;" required></br></br>
		<p>Available Item:</p><input type="number" name="availableitem" placeholder="Available Item" style="margin-left:100px;"></br></br>
		<p>Item Weight(in gm/ml/pc):</p><input type="text" name="itemweight" placeholder="Item Weight" style="margin-left:25px;" required></br><br>
		<center><input type="submit" name="submit" value="SUBMIT" style="margin-top:5px; width:100px;height:50px;"></center>
		</form>
	</div>
</body>
</html>
		
