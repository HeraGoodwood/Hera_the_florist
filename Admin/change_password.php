<?php

session_start();
include "Database_connection.php";

if(isset($_POST['submit']))
{	
$PASS=$_POST['password'];

$sql="UPDATE owner SET Owner_password='$PASS' WHERE Owner_id='O01' ;";
if(!mysqli_query($conn,$sql))
{
echo'<script>alert("Not Inserted")</script>';
echo'<script>window.location="http://localhost/Hera_Florist/Admin/change_password.php"</script>';
}
else
header('location: http://localhost/Hera_Florist/Admin/owner_login.php');
}
?>

<html>
<head>
<title>ADMIN PASSWORD RESET FORM</title>
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
<h1>CHANGE PASSWORD FORM</h1>
</div>
<div class="data"  align="center">
    <form name="password_reset_form" action="http://localhost/Hera_Florist/Admin/change_password.php" method="post">
        <table border="0">
	<col width="200">
	    <tr>
                <td><h3><label>Password(4 alphanumeric values)</label></h3></td>
                <td><input type="password" name="password" required></input></td>
            </tr>
            <tr>
		
                <td><input type="submit" name="submit" value="Submit" />
                <td><input type="reset"  value="Reset"/>		
            </tr>
	<tr>		
            </tr>
        </table>
 </form>
</div>
</body>
</html>