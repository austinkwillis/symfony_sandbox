<?php

namespace Austin\TriggerBundle\Util;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

class MailHelper
{
    protected $mailer;

    public function __construct()
    {
        $transport = Swift_SmtpTransport::newInstance('', 25)
		->setUsername('')
		->setPassword('');



	// Create the Mailer using your created Transport
	$mailer = Swift_Mailer::newInstance($transport);
    }

    public function sendEmail($from, $to, $body, $subject = '')
    {
        $message = Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from)
            ->setTo($to)
            ->setBody($body);

        $this->mailer->send($message);
    }
}
?>