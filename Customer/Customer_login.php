<?php
if (isset($_POST['submit'])) {
		
include "Database_connection.php";
		
$username = mysqli_real_escape_string($conn, $_POST['Customer_name']);
$userpass = mysqli_real_escape_string($conn, $_POST['Customer_password']);
		
$sql = "SELECT * FROM customer WHERE customer_name=? AND customer_password=? AND Verification='1'";
$stmt = mysqli_stmt_init($conn);
			
if (mysqli_stmt_prepare($stmt, $sql)) 

{
mysqli_stmt_bind_param($stmt, "ss", $username, $userpass);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
				
if ($row = mysqli_fetch_assoc($result)) {
			
if ($result == true) {
	session_start();
	$_SESSION["loggedin"] = true;
      	$_SESSION["customer_name"] = $username; 
      	$_SESSION["customer_id"] = $row["customer_id"];
header("location: http://localhost/Hera_Florist/Customer/MainPage.php");
}

else {
echo '<script>alert("Incorrect username or password.")</script>';
echo '<script>window.location="http://localhost/Hera_Florist/Customer/Customer_login.php"</script>';
}
}
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
<h1>CUSTOMER LOGIN</h1>
</div>
<form action="http://localhost/Hera_Florist/Customer/Customer_login.php" method="post">

<div class="login_box">
<div class="text_box">
    <label for="Customer_name"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="Customer_name" required>
</div>
<div class="text_box">
    <label for="Customer_password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Customer_password" required>
</div>
    <button name="submit" type="submit">Login</button>
<div>
<br><a href="http://localhost/Hera_Florist/Customer/Reg_or_login.html" class="btn Cancel">Cancel</a></br>
<br><a href="http://localhost/Hera_Florist/Customer/forgot_password.php" class="btn Cancel">Forget Password</a></br>
</div>
</div>
</body>
</form>
</html>