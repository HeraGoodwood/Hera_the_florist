<?php
 
// Check if the user is logged in, otherwise redirect to login page

include "Database_connection.php";

$EMAIL=$_POST['email'];
$PASSWORD=$_POST['Customer_password'];
$sql="UPDATE customer SET customer_password = '$PASSWORD' WHERE Email_address = '$EMAIL'; ";
if(!mysqli_query($conn,$sql))
echo 'Try Again';
else
header("location: Customer_login.php");
?>