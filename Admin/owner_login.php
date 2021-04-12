<?php

include "Database_connection.php";
if(isset($_POST['submit']))
{
$userid = $_POST['Owner_id'];
$password = ($_POST['Owner_password']);
$sql = "SELECT * FROM owner WHERE Owner_id='$userid' and Owner_password='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
header("location: http://localhost/Hera_Florist/Admin/Owner_choice.php");
else
{
echo'<script>alert("Incorrect ID or Password.")</script>';
echo'<script>window.location="http://localhost/Hera_Florist/Admin/owner_login.php"</script>';
}
}
?>




<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.body_bg
{
background: url(Hera.jpg) no-repeat center center fixed; 
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
	font-family: Arial, Helvetica, sans-serif;
 

}
.login_box
{
width: 300px;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
colour: white;
background-color: #ffffff;
  opacity: 0.9;
  filter: alpha(opacity=90); /* For IE8 and earlier */
}
.login_box h1
{
float: left;
font-weight: bold;
font_size: 40px;
border-bottom: 6px solid #4caf50;
margin-bottom: 50px;
padding: 13px 0;
}
.text_box
{
width: 100%;
overflow: hidden;
font-size: 20px;
padding: 8px 0;
margin 8px 0;
border-bottom: 1px solid #4caf50; 
}
.text_box input
{
border: none;
outline: none;
background: none;
}
/* Set a style for all buttons */
button 
{width: 100%;
background: none;
border: 2px solid #4caf50;
colour:white;
padding: 5px;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}


}
</style>
<body class="body_bg">
<div class="header" align="center">
<h1>OWNER LOGIN</h1>
</div>
<form action="http://localhost/Hera_Florist/Admin/owner_login.php" method="post">

  <div class="login_box">
	<div class="text_box">
    <label for="Owner_id"><b>Owner Id</b></label>
    <input type="text" placeholder="Enter Owner Id" name="Owner_id" required>
</div>

<div class="text_box">
    <label for="Owner_password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Owner_password" required>
</div>
    <button type="submit" name="submit">Login</button>

<div>
<br><a href="http://localhost/Hera_Florist/Owner_or_Cus.html" class="button">Cancel</a></br>
<br><a href="http://localhost/Hera_Florist/PHPMailer/Admin_forgot_password.php" class="button">Forgot Password</a></br>
</div>
</div>
</form>
</body>
</html>