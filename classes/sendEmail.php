<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class sendEmail
{

    public function send($userName, $email, $url)
    {

        require 'phpmailer/vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();                                            // use smtp
            $mail->Host       = 'smtp.mailtrap.io';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'd78836e21ebe46';                     // SMTP username
            $mail->Password   = '6ed1eeecd91caa';                               // SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 2525;                                    // TCP port 

            $mail->setFrom('hanyaboutaleeb@gmail.com', 'hany');
            $mail->addAddress($email, $userName);
            // Content in msg
            $mail->isHTML(true);
            $mail->Subject = 'Confirm your email';
            $mail->Body    = '<p> Hi ' . $userName . ' please confirm your email click on the below link</p> <p><a href="' . $url . '">Confirm email</a></p> ' . $url ;
            $mail->Body    = '<p> Hi ' . $userName . '   to change password or active email</p> <p><a href="' . $url . '">   to confirm password or active email</a></p>' . $url;
            $mail->AltBody = '<p> Hi ' . $userName . ' please confirm your email click on the below link</p> <p><a href="' . $url . '">Confirm email</a></p> '. $url ;
            $mail->send();
            return true;
        } 
        catch (Exception $e) {
            return false;
        }
    }
}
