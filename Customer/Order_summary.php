<?php
include "Customer_navi.html";
session_start();
include "Database_connection.php";
?>
<!DOCTYPE html>
<html>

<head>

<style>


/*Background and main font*/
.body_bg
{
	background: url(red_buds_flowers-wide.jpg) no-repeat center center fixed; 
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 30px;
}
/*Button*/
.dropbtn 
{
    	background-color: black;
    	padding: 14px 28px;
    	font-size: 16px;
    	cursor: pointer;
    	color: white;

}

tr th
{
font-weight:bold;
}
tr th , tr td
{
	padding:5px;
}
th 
{
    border: 5px solid #C1DAD7;
}
td
{
	border: 5px solid #C1DAD7;
line-height:30px;
}
.table1{
	background:#4b8c74;
}
.note
{
background:#4b8c74;
}
</style>
<title>Hera The Florist</title>
</head>

<div1>
<body class="body_bg">
<h1>Hera The Florist</h1>   
<h3>Your Cart</h3>
</div1>
<div align="center" class="display">
<table class='table1'>
<tr class='table2'> 
<th>Product</th>
<th>Product ID</th>
<th>Order ID</th>
<th>Delivery Address</th>
<th>Delivery Date</th>
<th>Quantity</th>
<th>Price Per Item(RM)</th>
<th>Price(RM)</th>
</tr>
<?php
$ID=$_SESSION["customer_id"];
$total=0;
$sql="SELECT customer_id, Product_id, Delivery_address,Price, Order_id, Delivery_date, Quantity FROM cart WHERE customer_id='$ID' AND Invoice_status='0' ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
$Sum=$row["Price"]*$row["Quantity"];
$total=$total+$Sum;
?>
<form method="post" action="http://localhost/Hera_Florist/Customer/Invoice.php">
<input type="hidden" name="Order_id" value="<?php echo $row["Order_id"]; ?>"/>
<tr>
<td><img src="Product\<?php echo $row["Product_id"]; ?>.jpg" style="width:150px;height:160px" ></td>
<td><h4 class="text"><?php echo $row["Product_id"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Order_id"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Delivery_address"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Delivery_date"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Quantity"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Price"]; ?></h4></td>
<td><h4 class="text"><?php echo $Sum; ?></h4></td>
</tr>
<?php
}
}
?>
<th><?php echo 'Total RM:' .$total; ?></th>
<input type="hidden" name="Invoice_amount" value="<?php echo $total; ?>"/>
<input type="hidden" name="Invoice_date" value="<?php echo date("Y/m/d"); ?>"/>

</table>
</div>
<div class="note">
<h4>Note:</h4>
<h5>1. Kindly please make the payment to the account no:....... 3 days before the delivery date.</h5>
<h5>2. Kindly please send an attachment of prove of payment to whatsapp no: ......</h5>
<h5>3. The delivery will only will be proceeded when the payment is made.</h5>
<h5>4. Cash on delivery is not available.</h5>
</div>
<div3>
<td><input type="submit" class='dropbtn' value="CONFIRM"></td>
</div3>
</form>
</body>
</html>