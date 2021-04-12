<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$SERVERNAME="localhost";
$USERNAME="root";
$PASSWORD="";
$DB="hera_florist";
$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DB);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


//Insert	
$NAME=$_POST['Customer_name'];
$PHONENO=$_POST['Customer_phone_no'];
$BILLADD=$_POST['Billing_address'];
$DELADD=$_POST['Email_address'];
$PASSWORD=$_POST['Customer_password'];

$sql="SELECT * FROM customer WHERE customer_name='$NAME'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{

$sql="INSERT INTO customer (customer_id,customer_name,customer_password,customer_phone_no,Billing_address,Email_address,Verification) values (NULL,'$NAME','$PASSWORD','$PHONENO','$BILLADD','$DELADD','0')";
if(!mysqli_query($conn,$sql))
{
echo 'Try Again';
}
else
{


// Load Composer's autoloader
require 'vendor/autoload.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try 
{
    //Server settings
    $mail->SMTPDebug = 1;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                // Enable SMTP authentication
    $mail->Username   = 'heraknightgoodwood1926@gmail.com';                     // SMTP username
    $mail->Password   = 'Heratheflorist';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('heraknightgoodwood1926@gmail.com');
    $mail->addAddress($DELADD);     // Add a recipient

    // Attachments
    $body='http://localhost/Hera_Florist/Customer/email_verify.php?email='.$DELADD;
 
	// Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Hera The Florist-Email verification';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
	header('location: http://localhost/Hera_Florist/Customer/Customer_login.php');
} 
catch (Exception $e) 
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>