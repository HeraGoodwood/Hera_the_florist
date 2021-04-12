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
<h4>Item is added one by one because the delivery address and date may vary for each product.</h4>
<h4>The Delivery is only available inside the state of Malacca. Thank You.</h4>   
</div1>

<div align="center" class="display">
<table class='table1'>
<tr class='table2'> 
<th>Product</th>
<th>ID</th>
<th>Price(RM)</th>
<th>Details</th>
<th>ORDER</th>
</tr>

<?php

$id =$_POST['Product_Id'];
$sql="SELECT Product_Id,Product_image,Product_price,Product_description FROM proudct WHERE Product_Id='$id' ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
?>
<form method="post" >
<input type="hidden" name="Product_Id" value="<?php echo $row["Product_Id"]; ?>"/>
<input type="hidden" name="Product_price" value="<?php echo $row["Product_price"]; ?>"/>

<tr>
<td><img src="Product\<?php echo $row["Product_Id"]; ?>.jpg" style="width:300px;height:320px" ></td>
<td><h4 class="text"><?php echo $row["Product_Id"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Product_price"]; ?></h4></td>
<td>
		<p><label>Quantity</label>
                <input type="text" placeholder="Quantity" name="Quantity" ></input></p>
                <p><label>Delivery Address</label>
                <input type="text" placeholder="Delivery Address" name="Delivery_address" ></input></p>
                <p><label>Delivery Date</label>
                <input type="date" min="<?php echo date('Y-m-d', time()+432000); ?>" placeholder="DD/MM/YYYY" name="Delivery_date" ></input></p>
</td>
<td><button type="submit" name="Add" class='dropbtn'>PLACE ORDER</button></td>
</tr>
</form>
<?php
}
}
?>
</table>
</div>
</body>
</html>
<?php
if (isset($_POST['Add']))
{
$ID=$_SESSION["customer_id"];
$PID=$_POST["Product_Id"];
$DELADD=$_POST["Delivery_address"];
$PRICE=$_POST["Product_price"];
$DELDATE=$_POST["Delivery_date"];
$QUAN=$_POST["Quantity"];
$SQL= "INSERT INTO cart (customer_id, Product_id, Delivery_address,Price, Order_id, Delivery_date,Quantity,Invoice_status) values ('$ID','$PID','$DELADD','$PRICE',NULL,'$DELDATE','$QUAN','0')";
if(!mysqli_query($conn,$SQL))
{
echo'<script>alert("Not Inserted.")</script>';
echo'<script>window.location="http://localhost/Hera_Florist/Customer/Add_To_Cart.php"</script>';
}
else
header("location:http://localhost/Hera_Florist/Customer/Cart.php");
}
?>