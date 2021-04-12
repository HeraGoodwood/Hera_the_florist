<?php

session_start();
include "Customer_navi.html";
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
background:#3895D3;
padding:10px;

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
.column {
  float: left;
  width: 50%;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
<title>Hera The Florist</title>
</head>
<div1>
<body class="body_bg">
<h1>Hera The Florist</h1>   
<h3>Invoice</h3>
</div1>
<div align="center" class="display">
<?php
$no =$_POST['Invoice_no'];
$ID=$_SESSION["customer_id"];
$sql="SELECT * FROM invoice WHERE Invoice_no='$no' AND Customer_id='$ID';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
?>
<div class="row">
<tr>
<div class="column">
<td><h4 class="text">Order Status: <?php echo $row["order_status"]; ?></h4></td>
<td><h4 class="text">Invoice No:<?php echo $row["Invoice_no"]; ?></h4></td></div>
<div class="column">
<td><embed src="fpdf181\<?php echo $row["Invoice_no"]; ?>.pdf" type="application/pdf" width="90%" height="120%" /></td>
</div>
</tr>
<?php
}
}
?>
</div>
</table>
</div>
</form>
</body>
</html>

