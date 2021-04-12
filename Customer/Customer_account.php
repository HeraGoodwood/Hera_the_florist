<?php
include "Customer_navi.html";
session_start();
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
	background:#4b8c74;
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


</style>
<title>Hera The Florist</title>
</head>
<div1>
<body class="body_bg">
<h1>Hera The Florist</h1>   
<h3>My Account</h3>
<a href="http://localhost/Hera_Florist/Customer/reset_password.php">Reset Password</a>
</div1>
<div align="center" class="display">
<table class='table1'>
<tr class='table2'> 
<th>Customer ID</th>
<th>Name</th>
<th>Phone Number</th>
<th>Billing Address</th>
<th>Email Address</th>
<th>Edit</th>
</tr>

<?php
$ID=$_SESSION["customer_id"];
$sql="SELECT customer_id, customer_name, customer_phone_no, Billing_address, Email_address FROM customer WHERE customer_id='$ID'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
?>
<form method="post" action="http://localhost/Hera_Florist/Customer/Customer_update_form.php" >
<input type="hidden" name="customer_id" value="<?php echo $row["customer_id"]; ?>"/>
<input type="hidden" name="customer_name" value="<?php echo $row["customer_name"]; ?>"/>
<input type="hidden" name="customer_phone_no" value="<?php echo $row["customer_phone_no"]; ?>"/>
<input type="hidden" name="Billing_address" value="<?php echo $row["Billing_address"]; ?>"/>
<input type="hidden" name="Email_address" value="<?php echo $row["Email_address"]; ?>"/>
<tr>
<td><h4 class="text"><?php echo $row["customer_id"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["customer_name"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["customer_phone_no"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Billing_address"]; ?></h4></td>
<td><h4 class="text"><?php echo $row["Email_address"]; ?></h4></td>
<td><button type="submit" class='dropbtn'>EDIT</button></td>
<?php
}
}
?>
</table>
</div>

</body>
</html>