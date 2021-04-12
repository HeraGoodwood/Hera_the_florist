<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$DELADD=$_POST['Email_address'];
$SERVERNAME="localhost";
$USERNAME="root";
$PASSWORD="";
$DB="hera_florist";
$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DB);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * FROM customer WHERE Email_address='$DELADD' AND Verification='1';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
//$filepath="C:\xampp\htdocs\Hera_Florist\fpdf181"


// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try 
{
    //Server setting
    
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                // Enable SMTP authentication
    $mail->Username   = 'heraknightgoodwood1926@gmail.com';                     // SMTP username
    $mail->Password   = '*****';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('heraknightgoodwood1926@gmail.com');
    $mail->addAddress($DELADD);     // Add a recipient

    // Attachments
    $body= 'change_password.php?email='.$DELADD;
    $mail->isHTML(true);                                  
    $mail->Subject = 'Hera The Florist';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
	echo"message sent";
header('location: Customer_login.php');
} 
catch (Exception $e) 
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else
{
echo'<script>alert("Incorrect email address")</script>';
echo'<script>window.location="Customer_login.php"</script>';
}
?>