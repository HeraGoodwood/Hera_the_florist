<?php
include "Customer_navi.html";
session_start();
$SERVERNAME="localhost";
$USERNAME="root";
$PASSWORD="";
$DB="hera_florist";


$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DB);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
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
</div>
<div1>
<body class="body_bg">
<h1>Hera The Florist</h1>   
</div1>

<div align="center" class="display">
<table class='table1'>
<tr class='table2'> 
<th>Product</th>
<th>ID</th>
<th>Price(RM)</th>
<th>Description</th>
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
<form method="post" action="http://localhost/Hera_Florist/Customer/Add_To_Cart.php" >
<input type="hidden" name="Product_Id" value="<?php echo $row["Product_Id"]; ?>"/>
<tr>
<td><img src="Product\<?php echo $row["Product_Id"]; ?>.jpg" style="width:300px;height:320px" ></td>
<td><h4 class="text"><?php echo $row["Product_Id"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Product_price"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Product_description"]; ?></h4></td>
<td><button type="submit" class='dropbtn'>PROCEED TO CART</button></td>
</tr>
</form>
<?php
}
}
?>
</table>
</body>
</html>