<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:logsig.php');
}
	$con=mysqli_connect("localhost","root","","db2017ca07");
	if(!$con)
{
	exit();
}
$regno=$_SESSION['username'];
$q="select * from cart where reg_no='$regno'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
	$row=mysqli_fetch_assoc($result);
	$ti=$row["total_item"];
	$ta=$row["total_amount"];
	$qi="insert into orders(reg_no,total_item,total_amount)values('$regno','$ti','$ta')";
	$result2=mysqli_query($con,$qi);
	echo "<p>Reg No:</p>".$row["reg_no"];
	echo "<p> Total Amount:</p>".$row["total_amount"]."<br>";
	echo "<p> Total Item:</p>".$row["total_item"]."<br>";
}
else
{
	echo "<h1><center>Select Item From Cart</center> </h1>";
}
$qd="delete from cart where reg_no='$regno'";
mysqli_query($con,$qd);
?>

