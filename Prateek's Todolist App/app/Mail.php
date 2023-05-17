<?php
/**
 * @file
 * Contains \app\Mail.
 *
 * Provides functionality to send emails using PHPMailer library and configuration settings from \app\Config.
 */

namespace app;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use app\Config;

require_once("../vendor/autoload.php");

class Mail
{
    /**
     * Sends an email.
     *
     * @param string $to
     *   The recipient email address.
     * @param string $subject
     *   The subject of the email.
     * @param string $text
     *   The plain text version of the email body.
     * @param string $html
     *   The HTML version of the email body.
     *
     * @throws \PHPMailer\PHPMailer\Exception
     *   If there is an error sending the email.
     */
    public static function send($to, $subject, $text, $html)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = Config::SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = Config::SMTP_USERNAME;
        $mail->Password = Config::SMTP_PASSWORD;
        $mail->SMTPSecure = Config::SMTP_ENCRYPTION;
        $mail->Port = Config::SMTP_PORT;
        $mail->setFrom(Config::SMTP_FROM_EMAIL);
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $html;
        $mail->AltBody = $text;
        $mail->send();
    }
}
?>




