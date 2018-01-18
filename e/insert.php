<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

//Load composer's autoloader

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$institute = $_POST["institute"];
$iid = $_POST["iid"];
$email = $_POST["email"];
$phno = $_POST["phno"];
$pwd = $_POST["pwd"];
$hash = $hash = md5( rand(0,1000) );
if($mysqli->query("INSERT INTO users (fname, lname, institute, iid, address, email, pwd, phno, type, hash, active) VALUES('$fname', '$lname', '$institute', '$iid', '$address', '$email', '$pwd' , '$phno', 'user', '$hash' , 0)")){
	echo 'Data inserted';
	echo '<br/>';
}


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'projecttestbot@gmail.com';                 // SMTP username
    $mail->Password = 'sankalpsinha';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('noreply@SCIF.ac.in', 'SCIF Admin');
     $mail->addAddress($email, $fname);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Verification link - SICF Admin';
    $mail->Body    = '
 
Thanks for signing up!
Your SCIF account has been created, you can login with the registered credentials after you have activated your account by clicking the url below.
 
Please click this link to activate your account:
http://localhost/e/verify-email.php?email='.$email.'&hash='.$hash.''; // Our message above including the link
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

header("location:login.php");
?>
