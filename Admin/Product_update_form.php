<?php
session_start();
include "Database_connection.php";

if(isset($_POST['submit']))
{
$ID=$_POST['Product_id'];
$IMAGE=$_POST['Product_image'];
$PRICE=$_POST['Product_price'];
$DESC=$_POST['Product_description'];
$OCCASION=$_POST['Occasions'];
$FLOWERS=$_POST['Flowers'];
$ITEM=$_POST['Item'];
$sql="INSERT INTO proudct (Product_Id,Product_image,Product_price,Product_description,Occasions,Flowers,Item) values ('$ID','$IMAGE','$PRICE','$DESC','$OCCASION','$FLOWERS','$ITEM');";
if(!mysqli_query($conn,$sql))
{
echo'<script>alert("Incorrect ID or Password.")</script>';
echo'<script>window.location="http://localhost/Hera_Florist/Admin/Product_update_form.php"</script>';
}
else
header("location: http://localhost/Hera_Florist/Admin/Owner_choice.php");
}
?>

<html>
<head>
<title>PRODUCT UPDATE FORM</title>
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

.Back {
    position: fixed; /* or position: absolute; */
    top: 0;
    right: 0;
background-color: black;
    	padding: 14px 28px;
    	font-size: 16px;
    	cursor: pointer;
    	color: white;
}

</style>
<body class="body_bg">
<div align="center">

<h3>PRODUCT UPDATE FORM</h3>
    <form  method="post" action="http://localhost/Hera_Florist/Admin/Product_update_form.php" >
        <table border="0">
            <tr>
                <td><label>Product Id</label></td>
                <td><input type="text" name="Product_id" required></input></td>
            </tr>

    <tr>
                <td><label>Product Image</label></td>
                <td><input type="file" name="Product_image" required></input></td>
            </tr>
     
       <tr>
                <td><label>Product Price(RM)</label></td>
                <td><input type="number" name="Product_price" required></input></td>
            </tr>
	
    <tr>
                <td><label>Billing Description</label></td>
                <td><input type="text" name="Product_description" required></input></td>
            </tr>
	
    	<tr>
                <td><label>Occasions</label></td>
                <td>
		<input type="radio" name="Occasions" value="Congratulations">Congratulations</br>
		<input type="radio" name="Occasions" value="Birthday">Birthday</br>
		<input type="radio" name="Occasions" value="Graduation">Graduation</br>
		<input type="radio" name="Occasions" value="Gws">Get Well Soon</br>     
		<input type="radio" name="Occasions" value="Condolences">Condolences</br>
		<input type="radio" name="Occasions" value="-">None</br>        
		</td>
		</tr>

    <tr>
                <td><label>Flowers</label></td>
<td>
                <input type="radio" name="Flowers" value="Mixed">Mixed</br>
		<input type="radio" name="Flowers" value="Rose">Rose</br>
		<input type="radio" name="Flowers" value="Red Roses">Red Roses</br>
		<input type="radio" name="Flowers" value="-">None</br>
		</td>
            </tr>
            <tr>
                <td><label>Item</label></td>
<td>
                <input type="radio" name="Item" value="Flowers">Flowers</br>
		<input type="radio" name="Item" value="Basket">Basket</br>
		<input type="radio" name="Item" value="Balloon">Balloon</br>
		<input type="radio" name="Item" value="Chocolate">Chocolate</br>
		<input type="radio" name="Item" value="-">None</br>
</td>        
    </tr>
	    <tr>
				
                <td><input type="submit" name="submit" value="Submit" />
                <td><input type="reset" value="Reset"/>
				
            </tr>
        </table>
    </form>
</div>
<a href="http://localhost/Hera_Florist/Admin/Owner_choice.php" class="btn Back">Back</a>
</body>
</html>