<?php

$SERVERNAME="localhost";
$USERNAME="root";
$PASSWORD="";
$DB="hera_florist";
$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DB);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email=$_GET['email'];
$sql="UPDATE customer SET Verification = '1' WHERE Email_address = '$email' ";
if(!mysqli_query($conn,$sql))
{
echo 'Try Again';
}
else
{
header("location: http://localhost/Hera_Florist/Customer/Customer_login.php");
}

?>