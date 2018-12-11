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
if(isset($_POST['addcart']))
{
$quantity=$_POST['quantity'];
$price=$_POST['hiddenrate'];
$regno=$_SESSION['username'];
$totamt=$price*$quantity;
$q="select * from cart where reg_no='$regno'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
		{
		$row=mysqli_fetch_assoc($result);
		echo '<h1> Total Amount</h1>';
		echo $row["total_amount"]+$totamt;
		echo '<br>';
		echo '<h1> Total Item</h1>';
		echo $row["total_item"]+$quantity;
		
		$a=$row['total_amount']+$totamt;
		$b=$row["total_item"]+$quantity;	
		echo '<button style="float:right;margin-top:-150px;"><a href="payment.php">Payment</a></button>';
		$qu="UPDATE cart SET total_amount='$a' WHERE reg_no='$regno'";
		$qk="update cart set total_item='$b' where reg_no='$regno'";
		mysqli_query($con,$qu);
		mysqli_query($con,$qk);
		
		}
		else
		{
			//echo '<div class="panel panel-info container col-sm-9 col-sm-offset-3" style="border-radius: 70px;background-color:lightgreen;opacity:0.9;">';
			echo '<button style="float:right;margin-top:0px;" class="btn btn-success"><a href="payment.php">Payment</a></button>';
			echo '<h1> Total Amount</h1>';
			echo $totamt;
			echo '<br>';
			echo '<h1> Total Item</h1>';
			echo $quantity;
			$qi="insert into cart (reg_no,total_amount,total_item)values('$regno','$totamt','$quantity')";
			mysqli_query($con,$qi);
			//echo '</div><br><br>';
		}
		
}
else
{
	echo '<button id="button1" style="float:right;display:inline;"><a href="payment.php">Payment</a></button>';
}	
?>
<html>
<head>
	<title>Food Gallery</title>
	<style type="text/css">
            
	#mydiv
	{
	height:450px;
	width:300px;
	border-style:solid;
	border-color:red;
	float:left;
	margin-left:5px;
	margin-top:5px;
	}
	#text
	{
	padding:10px;
	text-align:center;
}

	h2 {

                font-weight: 300;
                font-size: 4em;
                color: white;
                background-color: tomato;
                padding: 10px 0 0px 10px;
                margin-bottom: 1px;
                border: 6px solid red;
                 border-radius: 30px;
            }
	
	</style>

	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
	
	<link href="./assets/css/font-awesome.css" rel="stylesheet">
	<link href="./assets/css/blog_page.css" rel="stylesheet">
	<link href="./assets/fonts/font.css" rel="stylesheet">
	<link href="./assets/css/index.css" rel="stylesheet">
	<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
	<script src="themes/1/js-image-slider.js" type="text/javascript"></script>

    <link href="generic.css" rel="stylesheet" type="text/css" />
	<script src="./assets/js/jquery.min.js"></script>

	<script src="./assets/js/bootstrap.min.js"></script>


</head>
<body style="background-color:red">
</br>
<div class="panel panel-info container " style="border-radius: 70px;background-color:lightgreen;opacity:0.9;">
	<marquee  direction="left"style="color:red;">
	<h1>50% discount over cart value rs.500<h1>
	</marquee>
</div>

<br>
			<div class="panel panel-info container " style="border-radius: 70px;background-color:lightgreen;opacity:0.9;">
			<h2 align="center">Shopping Cart</h2>
			<?php
			$q="select * from item order by item_id asc";
			$result=mysqli_query($con,$q);
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_array($result))
				{
				?>
				
				<div id="mydiv" class="panel panel-info container col-sm-offset-6" style="border-radius: 70px;background-color:khaki;opacity:0.9;margin:30px" >
					<form method="post" action="foodgallery.php">
					<img src="<?php echo $row["image"]; ?>" width="100%" height="75%" style="border-radius:150px;">
					<div id="text"><?php echo $row["item_name"] ?><br>
					Rate(in INR)   :<?php echo $row["item_rate"] ?><br>
					Available Item:<?php echo $row["avail_item"]; ?><br>
					Quantity      :<input type="text" name="quantity" value="1" maxlength="2" size="2"><br>
					<input type="hidden" name="hiddenname" value="<?php echo $row['item_name'];?>">
					<input type="hidden" name="hiddenrate" value="<?php echo $row['item_rate'];?>">
					<input type="submit" name="addcart" value="ADD CART" style="border-radius:12px; margin-top:3px;background-color:green">
					</div>
					
					</form>
				</div>
						<?php 
				}
			}
			?>
		</div>
			
</body>
</html>