<?php

session_start();
include "Database_connection.php";

$ID=$_SESSION["customer_id"];
$AMO=$_POST["Invoice_amount"];
$DATE=$_POST["Invoice_date"];
$SQL= "INSERT INTO invoice (Invoice_no, Invoice_date, Invoice_amount,Customer_id, order_status, status) values (NULL,'$DATE','$AMO','$ID','none','0')";
if(!mysqli_query($conn,$SQL))
{
echo 'Try Again';
}
else
header('location: http://localhost/Hera_Florist/Customer/fpdf181/Invoice_generator.php');
?>