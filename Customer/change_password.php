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
<div class="data"  align="center">
    <form action="change_password_server.php" method="post">
        <table border="0">
	<col width="200">
           
	    <tr>
                <td><h3><label>New Password(6 alphanumeric values)</label></h3></td>
                <td><input type="password" name="Customer_password"></input></td>
            </tr>
            <tr>
		<input type="hidden" name="email" value="<?php echo $_GET['email']; ?>"/>
                <td><input name="submit" type="submit"  value="Submit" />
     		
            </tr>
        </table>
 </form>
</div>
</body>
</html>