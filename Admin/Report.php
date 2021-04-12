<?php
session_start();
include "Report_navi.html";
include "Database_connection.php";

$Month=$_GET['month'];
$Month2=$_GET['month2'];
$Year= date("Y");

$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Occasions='Congratulations';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$CONG=0;
else
$CONG=$row["sum(cart.Price * cart.Quantity)"]; 
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Occasions='Birthday';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$BIRTH=0;
else
$BIRTH=$row["sum(cart.Price * cart.Quantity)"]; 
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Occasions='Graduation';";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$GRAD=0;
else
$GRAD=$row["sum(cart.Price * cart.Quantity)"]; 
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Occasions='Gws';";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$GWS=0;
else
$GWS=$row["sum(cart.Price * cart.Quantity)"];
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Occasions='condolences';";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$COND=0;
else
$COND=$row["sum(cart.Price * cart.Quantity)"]; 
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Flowers='Rose';";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$ROSE=0;
else
$ROSE=$row["sum(cart.Price * cart.Quantity)"]; 
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Flowers='Red Roses';";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$RROSE=0;
else
$RROSE=$row["sum(cart.Price * cart.Quantity)"]; 
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Flowers='Mixed';";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$MIX=0;
else
$MIX=$row["sum(cart.Price * cart.Quantity)"];
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Item='Basket';";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$BASKET=0;
else
$BASKET=$row["sum(cart.Price * cart.Quantity)"]; 
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Item='Flowers';";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
		{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$FLOWER=0;
else
$FLOWER=$row["sum(cart.Price * cart.Quantity)"];  
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Item='Balloon';";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$BALLOON=0;
else
$BALLOON=$row["sum(cart.Price * cart.Quantity)"]; 
}
}
$sql="SELECT sum(cart.Price * cart.Quantity) FROM cart INNER JOIN proudct ON cart.Product_id=proudct.Product_Id WHERE Month(cart.Delivery_date)= $Month AND Year(cart.Delivery_date)=$Year AND proudct.Item='Chocolate';";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = $result->fetch_assoc())
	{
if ($row["sum(cart.Price * cart.Quantity)"]==NULL)
$CHOC=0;
else
$CHOC=$row["sum(cart.Price * cart.Quantity)"]; 
}
}
?>
<!DOCTYPE html>
<html lang="en-US">
<body>

<h1><?php echo $Month2; ?></h1>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Occasions', 'Sales Per Month'],
  ['Congratulations', <?php echo $CONG; ?>],
  ['Birthday', <?php echo $BIRTH; ?>],
  ['Graduation', <?php echo $GRAD; ?>],
  ['Get well Soon', <?php echo $GWS; ?>],
  ['Condolences', <?php echo $COND; ?>]
]);
  var data2 = google.visualization.arrayToDataTable([
  ['Flowers', 'Sales Per Month'],
  ['Roses', <?php echo $ROSE; ?>],
  ['Red Roses', <?php echo $RROSE; ?>],
  ['Mixed', <?php echo $MIX; ?>]
]);
  var data3 = google.visualization.arrayToDataTable([
  ['Items', 'Sales Per Month'],
  ['Basket', <?php echo $BASKET; ?>],
  ['Flowers', <?php echo $FLOWER; ?>],
  ['Balloon', <?php echo $BALLOON; ?>],
  ['Chocolate', <?php echo $CHOC; ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Occasions', 'width':550, 'height':400};
var options2 = {'title':'Flowers', 'width':550, 'height':400};
var options3 = {'title':'Item', 'width':550, 'height':400};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
  chart.draw(data, options);
var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
  chart.draw(data2, options2);
var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
  chart.draw(data3, options3);
}
</script>

        <!--Divs that will hold the charts-->
        <div id="chart_div" ></div>
        <div id="chart_div2"></div>
        <div id="chart_div3"></div>
     
</body>
</html>