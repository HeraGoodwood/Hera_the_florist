<?php

session_start();
include "Database_connection.php";

if(isset($_GET['id']))
{
$OID=$_GET['id'];
$SQL= "DELETE FROM proudct WHERE Product_Id='$OID' ";
if(!mysqli_query($conn,$SQL))
{
echo 'Try Again';
}
else
header("location: http://localhost/Hera_Florist/Admin/Product_list.php");
}
?>