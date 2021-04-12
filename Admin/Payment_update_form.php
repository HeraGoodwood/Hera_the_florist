<?php

session_start();
include "Database_connection.php";

if(isset($_POST['submit']))
{	
$NO=$_POST['Invoice_no'];
$DATE=$_POST['Payment_date'];
$AMOUNT=$_POST['Payment_amount'];
$sql="INSERT INTO payment (Payment_id,Invoice_no,Payment_date,Payment_amount) values (NULL,'$NO','$DATE','$AMOUNT')";
if(!mysqli_query($conn,$sql))

{
echo'<script>alert("Try Agai")</script>';
echo'<script>window.location="http://localhost/Hera_Florist/Admin/Payment_update_form.php"</script>';
}
else
header("location: http://localhost/Hera_Florist/Admin/Payment_list.php");
}
?>

<html>
<head>
<title>PAYMENT UPDATE FORM</title>
</head>
<style>
.body_bg
{
	background: url(purple.jpg) no-repeat center center fixed; 
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;*/
	background-color: lightblue;
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
<body class="body_bg">
<div align="center">

<h3>PAYMENT UPDATE FORM</h3>
    <form name="Payment_update_form" method="post" action="http://localhost/Hera_Florist/Admin/Payment_update_form.php" >
        <table border="0">
            <tr>
                <td><label>Invoice No</label></td>
                <td><input type="text" name="Invoice_no" required></input></td>
            </tr>
            <tr>
                <td><label>Payment Date</label></td>
                <td><input type="date" name="Payment_date" required></input></td>
            </tr>
	    <tr>
                <td><label>Payment Amount(RM)</label></td>
                <td><input type="number" name="Payment_amount" required></input></td>
            </tr>		
                <td><input type="submit" name="submit" value="Submit" />
                <td><input type="reset" value="Reset"/>
				
            </tr>
        </table>
    </form>
</div>
<a href="http://localhost/Hera_Florist/Admin/Owner_choice.php" class="btn Back">Back</a>
</body>
</html>