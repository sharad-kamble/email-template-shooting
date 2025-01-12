<?php
// Include PHPMailer autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create a new PHPMailer instance
$mail = new PHPMailer( true );

try {
    // Server settings
    $mail->SMTPDebug = 0;
    // Disable verbose debug output ( 0 for no debug )
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    // Use Gmail's SMTP server
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = '@gmail.com'; // Your Gmail address
    $mail->Password = ' pass'; // Your Gmail App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587; // Port for TLS

    // Recipients
    $mail->setFrom('@gmail.com', 'IT Services'); // Sender's email and name
    $mail->addAddress( '@gmail.com', 'Sidd' );
    // Recipient's email and name

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Welcome to Our Service!'; // Email subject
    $mail->Body = file_get_contents('email_template.html'); // Load HTML email content
    $mail->AltBody = 'This is the plain text version of the email content.'; // Fallback plain text

    // Send the email
    $mail->send();

    // Display success message as an alert
    echo "<script>alert('Email has been sent successfully!');</script>";
} catch (Exception $e) {
    // Display error message as an alert
    echo "<script>alert('Email could not be sent. Error: " . htmlspecialchars($mail->ErrorInfo) . "' );
    </script>";
}
?>