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
<form action="Cus_forgot_password.php" method="post">

<div class="login_box">
<h3>Please Check Your email after submission<h3>
<div class="text_box">
    <label for="Customer_name"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="Customer_name" required>
</div>
<div class="text_box">
    <label for="Email_address"><b>Email Address</b></label>
    <input type="text" placeholder="Enter Email" name="Email_address" required>
</div>
    <button name="submit" type="submit">Submit</button>
<div>
<br><a href="Reg_or_login.html" class="btn Cancel">Cancel</a></br>
</div>
</div>
</body>
</form>
</html>