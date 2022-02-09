<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once(File::build_path(array("phpmailer", "Exception.php")));
require_once(File::build_path(array("phpmailer", "PHPMailer.php")));
require_once(File::build_path(array("phpmailer", "SMTP.php")));

class Contact
{
    public static function sendEmail()
    {
        $mail = new PHPMailer(true);
        if (isset($_POST['submit'])) {
            $surname = $_POST['surname'];
            $firstname = $_POST['firstname'];
            $email = $_POST['email'];
            $zip = $_POST['zip'];
            $countryselect = $_POST['countryselect'];
            $via = $_POST['via'];
            $autreOption = $_POST['autreOption'];
            $dateContact = $_POST['datecontact'];
            $msg = $_POST['msg'];

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'friendsbulls@gmail.com'; // Gmail address which you want to use as SMTP server
                $mail->Password = 'projetcanin'; // Gmail address Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = '587';

                $mail->setFrom('friendsbulls@gmail.com'); // Gmail address which you used as SMTP server
                $mail->addAddress('friendsbulls@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

                $mail->isHTML(true);
                $mail->Subject = 'Message Received (Contact Page)';
                $mail->Body = "<h3>Name : $firstname $surname <br>Email: $email <br>Code postal: $zip <br>Pays: $countryselect <br>Entendu parlé de nous via : $via <br>Si autre : $autreOption  <br>Date de contact préférée: $dateContact <br>Message : $msg </h3>";

                $mail->send();
                return '<div class="alert-success">
                 <span>Message envoyé! Merci de nous avoir contacté.</span>
                </div>';
            } catch (Exception $e) {
                return'<div class="alert-error">
                <span>' . $e->getMessage() . '</span>
              </div>';
            }
        }
    }
}






