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
<th>Remove</th>
</tr>

<?php
$ID=$_SESSION["customer_id"];
$total=0;
$sql="SELECT * FROM cart WHERE customer_id='$ID' and Invoice_status='0' ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
$Sum=$row["Price"]*$row["Quantity"];
$total=$total+$Sum;
?>
<form method="post">
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
<td><input type="submit" class='dropbtn' name="Delete" value="DELETE"></td>
</tr>
</form>
<?php
}
}
?>
<th><?php echo 'Total RM:' .$total; ?></th>
</table>
</div>
<?php
if (isset($_POST['Delete']))
{
$ID=$_SESSION["customer_id"];
$OID=$_POST["Order_id"];
$SQL= "DELETE FROM cart WHERE Order_id='$OID' ";
if(!mysqli_query($conn,$SQL))
{
echo'<script>alert("Not Inserted.")</script>';
echo'<script>window.location="http://localhost/Hera_Florist/Customer/Cart.php"</script>';
}
else
header("location:http://localhost/Hera_Florist/Customer/Cart.php");
}
?>
<th><input type="button" class='dropbtn' onclick="window.location='http://localhost/Hera_Florist/Customer/Order_summary.php?id=$ID' " value="CHECK OUT"></th>
</form>
</body>
</html>
