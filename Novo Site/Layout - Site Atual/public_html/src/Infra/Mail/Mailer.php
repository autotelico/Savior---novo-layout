<?php

namespace App\Infra\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public function __construct(
        private PHPMailer $mailService,
    ){
        $this->mailService = new PHPMailer(false);
    }

    public function buildEmail(string $recipient, string $subject): self
    {
        //Server settings
        $this->mailService->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $this->mailService->isSMTP();                                            //Send using SMTP
        $this->mailService->Host       = SMTP_HOST;                     //Set the SMTP server to send through
        $this->mailService->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mailService->Username   = SMTP_EMAIL;                     //SMTP username
        $this->mailService->Password   = SMTP_PASS;                               //SMTP password
        $this->mailService->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mailService->Port       = SMTP_PORT;                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $this->mailService->setFrom(SMTP_SENDER_EMAIL, SERVER_NAME);
        $this->mailService->addAddress($recipient);               //Name is optional
        $this->mailService->addReplyTo(SMTP_SENDER_EMAIL, SERVER_NAME);
    
        //Content
        $this->mailService->isHTML(true);                                  //Set email format to HTML
        $this->mailService->Subject = $subject;
        return $this;
    }

    public function setBody(string $body): self
    {
        $this->mailService->Body = $body;
        return $this;
    }

    public function send(): void
    {
        try {
            $this->mailService->send();
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            throw new Exception("O serviço de envio de e-mails está indisponível no momento.");
        }
    }
}