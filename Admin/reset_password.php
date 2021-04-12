<?php
session_start();
include "Database_connection.php";

$ID=$_SESSION["Owner_id"];
$PASSWORD=$_POST['owner_password'];
$sql="UPDATE owner SET Owner_password = '$PASSWORD' WHERE Owner_id = '$ID' ";
if(!mysqli_query($conn,$sql))
{
echo'<script>alert("Try Again")</script>';
echo'<script>window.location="http://localhost/Hera_Florist/Admin/Payment_update_form.php"</script>';
}
else
{
header("location: owner_login.php");
}
?>