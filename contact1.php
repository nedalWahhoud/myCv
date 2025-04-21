<?php
session_start();

include_once 'dataProcessing.php';
require 'PphMailer/vendor/autoload.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $firstName = htmlspecialchars(string: trim(string: $_POST["name"]));
    $lastName = htmlspecialchars(string: trim(string: $_POST["lastName"]));
    $senderEmail = htmlspecialchars(string: trim(string: $_POST["email"]));
    $subject = htmlspecialchars(string: trim(string: $_POST["subject"]));
    $message = htmlspecialchars(string: trim(string: $_POST["message"]));
    // hide inputs
    $receiverEmail = htmlspecialchars(string: trim(string: $_POST["receiverEmail"]));
    $passwordEmail = htmlspecialchars(string: $_POST["passwordEmail"]);
    if (!empty($firstName) && !empty($senderEmail) && !empty($message) && filter_var(value: $senderEmail, filter: FILTER_VALIDATE_EMAIL)) {
        
        $mail = new PHPMailer\PHPMailer\PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Gmail SMTP-Server
        $mail->Port = 587;
        $mail->SMTPAuth = true;

        $mail->Username = $receiverEmail;  // Your Gmail address
        $mail->Password = $passwordEmail;  // Your app password (NOT your Gmail password)
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;  // Use TLS encryption
        
        // Specify sender and Receiver
        $mail->setFrom(address: $senderEmail, name: $firstName . ' ' . $lastName,auto: true);
        $mail->addAddress(address: $receiverEmail, name: 'Receiver Name');  // Receiver the E-Mail
        // message configure
        $message = '<h4>'. htmlspecialchars(string: 'senderEmail: '. $senderEmail) . '</h4>' . nl2br(string: $message);

        // E-Mail-content
        $mail->isHTML(isHtml: true);  // HTML-content activate
        $mail->Subject = ''.$subject.'';
        $mail->Body    = ''.$message.'';
        $mail->AltBody = ''.$message.'';
        if(!$mail->send()) {
           $error= ''.$error.'' . $mail->ErrorInfo;
           echo $error;
           $_SESSION['message'] = $error;
        } else {
           $_SESSION['message'] = 'Message was sent successfully.';
        }
    } else {
       $_SESSION['message'] = 'Please fill in all fields correctly.';
    }
    header(header: "Location: ".$_SERVER["HTTP_REFERER"]); 
    exit;
}
?>