<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'carewellbioscience@gmail.com';                  // SMTP username
    $mail->Password   = '';                       // SMTP username (Your Gmail)

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
    $mail->Port       = 587;                                    // TCP port to connect to (TLS)

    //Recipients
    $mail->setFrom('carewellbioscience@gmail.com', 'Carewell');
    $mail->addAddress('carewellbioscience@gmail.com');           // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'New Inquiry from ' . $_POST['wpforms']['fields'][1]['last'];
    $mail->Body    = '<strong>Name:</strong> ' . $_POST['wpforms']['fields'][1]['last'] . '<br>'
        . '<strong>Email:</strong> ' . $_POST['wpforms']['fields'][2] . '<br>'
        . '<strong>Inquiry:</strong> ' . $_POST['wpforms']['fields'][2] . '<br>'
        . '<strong>Mobile No.:</strong> ' . $_POST['wpforms']['fields'][2] . '<br>'
        . '<strong>City:</strong> ' . $_POST['wpforms']['fields'][5];

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
