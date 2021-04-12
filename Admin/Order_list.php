<?php

session_start();
include "Owner_navi.html";
include "Database_connection.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

/*Background and main font*/
.body_bg
{
	background: url(purple.jpg) no-repeat center center fixed; 
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

/* Main content */
.display {
  margin-top: 30px; /* Add a top margin to avoid content overlay */
}


/* Create three columns of equal width */
.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

/* Style the list */
.product {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

/* Add shadows on hover */
.product:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

/* Pricing header */
.Product_image {
  background-color: #FFFFFF;
  text-color: black;
  font-size: 25px;
}

/* List items */
.product li {
  border-bottom: 1px solid #eee;
  padding: 10px;
  background-color: #FFFFFF;	
  text-align: center;
}

/* Grey list item */
.Product_price {
  background-color: #FFFFFF;
  font-size: 25px;
}

/* The "Sign Up" button */
.button {
  background-color: #0000FF;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
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
	background:#3895D3;
}
.Back {
    position: fixed; /* or position: absolute; */
    top: 0;
    right: 0;
background-color: black;
    	padding: 14px 28px;
    	font-size: 16px;
    	cursor: pointer;
    	color: white;
}


/* Style the "active" element to highlight the current page */
.topnav a.active {
  background-color: #2196F3;
  color: white;
}

/* Style the search box inside the navigation bar */
.topnav input[type=text] {
  //float: right;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}


</style>
<title>Hera The Florist</title>
</head>
<div1>
<body class="body_bg">
<h1>Hera The Florist</h1>   
<h3>Order</h3>
</div1>
<div2 class="topnav">
<form action="http://localhost/Hera_Florist/Admin/Order_search.php" method="post">
<input type="text" placeholder="Order Id.." name="Order_id">
<button type="submit">Search</button>
</div2>
<div align="center" class="display">
<table class='table1'>
<tr class='table2'> 
<th>Order ID</th>
<th>Product ID</th>
<th>Product</th>
<th>Delivery Address</th>
<th>Delivery Date</th>
<th>Quantity</th>

</tr>

<?php

$sql="SELECT * FROM cart ORDER BY Delivery_Date ASC";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
?>
<tr>
<td><h4 class="text"><?php echo $row["Order_id"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Product_id"]; ?></h4></td>
<td><img src="Product\<?php echo $row["Product_id"]; ?>.jpg" style="width:150px;height:160px" ></td>
<td><h4 class="text"><?php echo $row["Delivery_address"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Delivery_date"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Quantity"]; ?></h4></td>
<?php
}
}
?>
</table>
</div>
</body>
</html>