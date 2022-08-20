<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class mailController extends Controller
{
    public function email()
    {
       return view('email');
    }
    public function composeEMail()
    {
        require base_path("vendor/autoload.php");

        $mail = new PHPMailer(true);

        //Enable SMTP debugging.
        $mail->SMTPDebug = 3;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();
        //Set SMTP host name
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
        //Provide username and password
        $mail->Username = "netfornet8@gmail.com";
        $mail->Password = "Menua777menua";
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";
        //Set TCP port to connect to
        $mail->Port = 587;
        
        $mail->From = "name@gmail.com";
        $mail->FromName = "Full Name";
        
        $mail->addAddress("name@example.com", "Recepient Name");
        
        $mail->isHTML(true);
        
        $mail->Subject = "Subject Text";
        $mail->Body = "<i>Mail body in HTML</i>";
        $mail->AltBody = "This is the plain text version of the email content";
        if($mail->send()){
            echo 'true';
        }else{
            echo 'false';
        }
    }     
}
