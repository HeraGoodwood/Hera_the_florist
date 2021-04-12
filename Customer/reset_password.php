<?php
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: http://localhost/Hera_Florist/Customer/Customer_login.php");
    exit;
}
include "Database_connection.php";
if(isset($_POST['submit']))
{
$ID=$_SESSION["customer_id"];
$PASSWORD=$_POST['Customer_password'];
//$hashed_password = password_hash($PASSWORD, PASSWORD_DEFAULT);
$sql="UPDATE customer SET customer_password = '$PASSWORD' WHERE customer_id = '$ID' ";
if(!mysqli_query($conn,$sql))
echo 'Try Again';
else
header("location: http://localhost/Hera_Florist/Customer/Customer_login.php");
}
?>
<html>
<head>
<title>PASSWORD RESET FORM</title>
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
<h1>PASSWORD RESET</h1>
</div>
<a href="http://localhost/Hera_Florist/Customer/Customer_account.php" class="btn Back">Back</a>
<div class="data"  align="center">
    <form action="http://localhost/Hera_Florist/Customer/reset_password.php" method="post">
        <table border="0">
	<col width="200">
           
	    <tr>
                <td><h3><label>New Password(6 alphanumeric values)</label></h3></td>
                <td><input type="password" name="Customer_password"></input></td>
            </tr>
            <tr>
		
                <td><input name="submit" type="submit"  value="Submit" />
     		
            </tr>
        </table>
 </form>
</div>
</body>
</html>