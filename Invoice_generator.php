<?php
session_start();
$SERVERNAME="localhost";
$USERNAME="root";
$PASSWORD="";
$DB="mentalhealth";


$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DB);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
require('fpdf.php');

//Select the Products you want to show in your PDF file

$sql="SELECT * FROM user ;";
$result = mysqli_query($conn, $sql);
$INVNO= "";
$INVDATE= "";
$AMO = "";
while ($row = $result->fetch_assoc())
{
    $userid = $row["user_id"];
    $username = $row["username"];
    $useremail = $row["user_email"];
    $age = $row["age"];
    $date = $row["register_date"];
}

$sql="SELECT cart.Order_id, cart.Product_id,cart.Delivery_address,cart.Delivery_date,cart.Quantity,cart.Price, cart.customer_id,invoice.Invoice_no,invoice.Invoice_date,invoice.Invoice_amount,invoice.Customer_id FROM cart INNER JOIN invoice ON cart.customer_id=invoice.Customer_id WHERE cart.customer_id='$ID' and invoice.status='0' and cart.Invoice_status='0';";
$result = mysqli_query($conn, $sql);

//Initialize the 3 columns and the total

$USERID = $row["user_id"];
$USERNAME = $row["username"];
$USEREMAIL = $row["user_email"];
$AGE = $row["age"];
$DATE = $row["register_date"];

//For each row, add the field to the corresponding column
while ($row = $result->fetch_assoc())
{

    $oid = $row["Order_id"];
    $pid = $row["Product_id"];
    $ddate = $row["Delivery_date"];
    $dadd=$row["Delivery_address"];
    $quan = $row["Quantity"];
    $price = $row["Price"];
    $price2=$row["Quantity"]*$row["Price"];

    $OID = $OID.$oid."\n";
    $PID = $PID.$pid."\n";
    $DDATE = $DDATE.$ddate."\n";
    $DADD = $DADD.$dadd."\n";
    $QUAN = $QUAN.$quan."\n";
    $PRICE = $PRICE.$price."\n";
    $PRICE2=$PRICE2.$price2."\n";
    
}

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Invoice_position = 35;
$Y_Fields_Inv_Name_position = 50;
$Y_Fields_Inv2_Name_position = 55;
$Y_Fields_Cus_Name_position = 70;
$Y_Fields_Cus2_Name_position = 75;
$Y_Fields_Cus3_Name_position = 80;
//Fields Name position
$Y_Fields_Name_position = 110;
//Table position, under Fields Name
$Y_Table_Position = 116;
$Y_Fields_Total_Name_position = 190;
$Y_Fields_Note_Position = 200;
$Y_Fields_Note1_Position = 210;
$Y_Fields_Note2_Position = 220;
$Y_Fields_Note3_Position = 230;
$Y_Fields_Note4_Position = 240;
$Y_Fields_Note5_Position = 250;
$pdf->SetFont('Arial','B',30);

$pdf->SetY($Y_Fields_Invoice_position);
$pdf->SetX(80);
$pdf->Cell(60,6,'BILL');



$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Inv_Name_position);
$pdf->SetX(100);
$pdf->Cell(60,6,'INVOICE NUMBER: ');
$pdf->SetY($Y_Fields_Inv_Name_position);
$pdf->SetX(150);
$pdf->Cell(60,6,$INVNO);
$pdf->SetY($Y_Fields_Inv2_Name_position);
$pdf->SetX(100);
$pdf->Cell(60,6,'INVOICE DATE: ');
$pdf->SetY($Y_Fields_Inv2_Name_position);
$pdf->SetX(150);
$pdf->Cell(60,6,$INVDATE);
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Total_Name_position);
$pdf->SetX(100);
$pdf->Cell(60,6,'TOTAL AMOUNT(RM)');
$pdf->SetY($Y_Fields_Total_Name_position);
$pdf->SetX(150);
$pdf->Cell(60,6,$AMO);


$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Cus_Name_position);
$pdf->SetX(100);
$pdf->Cell(60,6,'CUSTOMER ID: ');
$pdf->SetY($Y_Fields_Cus_Name_position);
$pdf->SetX(150);
$pdf->Cell(60,6,$CID);
$pdf->SetY($Y_Fields_Cus2_Name_position);
$pdf->SetX(100);
$pdf->Cell(60,6,'CUSTOMER NAME: ');
$pdf->SetY($Y_Fields_Cus2_Name_position);
$pdf->SetX(150);
$pdf->Cell(60,6,$CNAME);
$pdf->SetY($Y_Fields_Cus3_Name_position);
$pdf->SetX(100);
$pdf->Cell(60,6,'CUSTOMER ADDRESS: ');
$pdf->SetY($Y_Fields_Cus3_Name_position);
$pdf->SetX(150);
$pdf->MultiCell(60,6,$CADD, 3);

$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Inv_Name_position);
$pdf->SetX(15);
$pdf->Cell(60,6,'HERA THE FLORIST ');
$pdf->SetY($Y_Fields_Inv2_Name_position);
$pdf->SetX(15);
$pdf->Cell(60,6,'ONLINE SHOP');

$pdf->SetY($Y_Fields_Note_Position);
$pdf->SetX(15);
$pdf->Cell(60,6,'Note:');
$pdf->SetY($Y_Fields_Note1_Position);
$pdf->SetX(15);
$pdf->Cell(60,6,'1. Kindly please make the payment to the account no:....... 3 days before the delivery date.');
$pdf->SetY($Y_Fields_Note2_Position);
$pdf->SetX(15);
$pdf->Cell(60,6,'2. Kindly please send an attachment of prove of payment to whatsapp no: ......');
$pdf->SetY($Y_Fields_Note3_Position);
$pdf->SetX(15);
$pdf->Cell(60,6,'3. The delivery will only will be proceeded when the payment is made.');
$pdf->SetY($Y_Fields_Note4_Position);
$pdf->SetX(15);
$pdf->Cell(60,6,'4. Cash on delivery is not available.');
$pdf->SetY($Y_Fields_Note5_Position);
$pdf->SetX(15);
$pdf->Cell(60,6,'5. This is auto generated online invoice so autorized signature is not necessary.');
//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(15);
$pdf->Cell(25,6,'USER ID',1,0,'L',1);
$pdf->SetX(40);
$pdf->Cell(30,6,'USERNAME',1,0,'L',1);
$pdf->SetX(70);
$pdf->Cell(40,6,'USER EMAIL',1,0,'L',1);
$pdf->SetX(110);
$pdf->Cell(45,6,'AGE',1,0,'L',1);
$pdf->SetX(155);
$pdf->Cell(30,6,'REGISTRATION DATE',1,0,'L',1);
$pdf->SetX(180);
$pdf->Cell(25,6,'PRICE(RM)',1,0,'R',1);


//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(25,6,$OID,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(30,6,$PID,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(40,6,$DDATE,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(45,6,$DADD,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(155);
$pdf->MultiCell(25,6,$QUAN,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(180);
$pdf->MultiCell(25,6,$PRICE2,1);
$pdf->SetY($Y_Table_Position);



//$date= "echo date("Y-m-d h:i:sa")";
$pdf->Output( $invno.'.pdf','F');

$sql="UPDATE invoice SET status = '1' WHERE Invoice_no = '$invno' ";
if(!mysqli_query($conn,$sql))
{
echo 'Try Again';
}
else
{
$sql="UPDATE cart SET Invoice_status = '1' WHERE customer_id = '$ID' ";
if(!mysqli_query($conn,$sql))
{
echo 'Try Again';
}
else
header('location: http://localhost/Hera_Florist/Customer/ViewInvoice.php?invno='.$invno);
}
?>
