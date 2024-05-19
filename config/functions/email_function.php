<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

define('MAILHOST', "smtp.gmail.com");
define('USERNAME', "equiposportx@gmail.com");
define('PASSWORD', "nifpmoijwqwdplhe");
define('SEND_FROM', "equiposportx@gmail.com");
define('SEND_FROM_NAME', "SportX");
define('REPLY_TO', "equiposportx@gmail.com");
define('REPLY_TO_NAME', "SportX");

function sendMail($email, $subject, $message)
{
    try {

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = MAILHOST;
        $mail->Username = USERNAME;
        $mail->Password = PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
        $mail->addAddress($email);
        $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = $message;
        if (!$mail->send()) {
            echo "
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'An unexpected error occurred',
                    text: 'Error sending email. Please try again later.'
                    });
                </script>";
        } else {
            echo "
            <script>
                Swal.fire({
                icon: 'success',
                title: 'Email sent',
                text: 'Success sending email.'
                });
            </script>";
        }
    } catch (Exception $e) {
        echo "
        <script>
            Swal.fire({
            icon: 'error',
            title: 'An unexpected error occurred',
            text: 'Error sending email. Please try again later.'
            });
        </script>";
    }
}
