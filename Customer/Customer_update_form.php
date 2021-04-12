<?php
session_start();
include "Database_connection.php";

if(isset($_POST['submit']))
{
//Insert
$ID=$_SESSION["customer_id"];	
$NAME=$_POST['Customer_name'];
$PHONENO=$_POST['Customer_phone_no'];
$BILLADD=$_POST['Billing_address'];
$DELADD=$_POST['Email_address'];
$sql="UPDATE customer SET customer_name='$NAME' ,customer_phone_no='$PHONENO' , Billing_address='$BILLADD' ,Email_address='$DELADD'  WHERE customer_id = '$ID';";
if(!mysqli_query($conn,$sql))
{
echo'<script>alert("Not Inserted.")</script>';
echo'<script>window.location="http://localhost/Hera_Florist/Customer/Customer_update_form.php"</script>';
}
else
header("location: http://localhost/Hera_Florist/Customer/Customer_account.php");
}
?>
<html>
<head>
<title>CUSTOMER UPDATE FORM</title>
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
.data{
   background-color:lightGrey;}

.Back {
    position: fixed; /* or position: absolute; */
    top: 0;
    right: 0;
	//border: none;
    	background-color: black;
    	padding: 14px 28px;
    	font-size: 16px;
    	cursor: pointer;
    	color: white;
}

</style>
<body class="body_bg">
<div class="header" align="center">
<h1>CUSTOMER UPDATE FORM</h1>
</div>
<a href="http://localhost/Hera_Florist/Customer/Customer_account.php" class="btn Back">Back</a>
<div class="data"  align="center">
    <form name="Customer_update_form" action="http://localhost/Hera_Florist/Customer/Customer_update_form.php" method="post">
	<input type="hidden" name="customer_id" value="<?php echo $row["customer_id"]; ?>"/>        
	<table border="0">
	<col width="200">
            <tr>
                <td><h3><label>Name</label></h3></td>
                <td><input type="text" name="Customer_name" value="<?php echo $_POST["customer_name"] ?>" ></input></td>
            </tr>
            <tr>
                <td><h3><label>Contact Number</label></h3></td>
                <td><input type="number" name="Customer_phone_no" value="<?php echo $_POST["customer_phone_no"] ?>" ></input></td>
            </tr>
	    <tr>
                <td><h3><label>Billing Address</label></h3></td>
                <td><input type="text" name="Billing_address" value="<?php echo $_POST["Billing_address"] ?>"></input></td>
            </tr>
	    <tr>
                <td><h3><label>Email Address</label></h3></td>
                <td><input type="email" name="Email_address" value="<?php echo $_POST["Email_address"] ?>"></input></td>
            </tr>
            <tr>
		
                <td><input type="submit" name="submit" value="Save" />
    		
            </tr>
	<tr>
		
            <h4>Upon saving please verify your email account by accepting our mail</h3>		
            </tr>
        </table>
 </form>
</div>
</body>
</html>