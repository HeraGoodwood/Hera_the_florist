<?php

session_start();
include "Database_connection.php";

if(isset($_POST['submit']))
{
//Insert	
$ID=$_POST['Product_id'];
$PRICE=$_POST['Product_price'];
$DESC=$_POST['Product_description'];
$OCCASION=$_POST['Occasions'];
$FLOWERS=$_POST['Flowers'];
$ITEM=$_POST['Item'];
$sql=" UPDATE proudct SET Product_id='$ID',Product_price='$PRICE',Product_description='$DESC',Occasions='$OCCASION',Flowers='$FLOWERS',Item='$ITEM' WHERE Product_id='$ID'";
if(!mysqli_query($conn,$sql))
{
echo'<script>alert("Not Inserted")</script>';
echo'<script>window.location="http://localhost/Hera_Florist/Admin/Product_edit_form.php"</script>';
}
else
header("location: http://localhost/Hera_Florist/Admin/Product_list.php");
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
<h3>PRODUCT EDIT FORM</h3>
    <form name="Product_edit_form" method="post" action="http://localhost/Hera_Florist/Admin/Product_edit_form.php" >
        <input type="hidden" name="Product_id" value="<?php echo $row["Product_id"]; ?>"/> 
	<table border="0">
            <tr>
                <td><label>Product Id</label></td>
                <td><input type="text" name="Product_id" value="<?php echo $_POST["Product_id"] ?>"></input></td>
            </tr>
            <tr>
                <td><label>Product Price</label></td>
                <td><input type="number" name="Product_price" value="<?php echo $_POST["Product_price"] ?>" ></input></td>
            </tr>
	    <tr>
                <td><label>Billing Description</label></td>
                <td><input type="text" name="Product_description" value="<?php echo $_POST["Product_description"] ?>"></input></td>
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
				
                <td><input type="submit" name="submit" value="Save" />
				
            </tr>
        </table>
    </form>
</div>
<a href="http://localhost/Hera_Florist/Admin/Owner_choice.php" class="btn Back">Back</a>
</body>
</html>