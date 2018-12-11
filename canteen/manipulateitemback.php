<?php
session_start();
$con=mysqli_connect('localhost','root','','db2017ca07');
if($con)
{
	echo "connection sucessful";
	
}
else
{
	echo "no connection";
}
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

mysqli_close($con);
?>







