<?php

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
namespace Austin\TriggerBundle\Util;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

class MailHelper
{
    protected $mailer;

    public function __construct()
    {

    }

    public function sendEmail($from, $to, $body, $subject = '')
    {
	
	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'sslv3')
		->setUsername('aukwill@gmail.com')
		->setPassword('');

        $message = Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from)
            ->setTo($to)
            ->setBody($body);
            if (!$this->get('mailer')->send($message, $failures)){
                throw new NotFoundHttpException($failures);
            }

	// // Create the Mailer using your created Transport
	// $mailer = Swift_Mailer::newInstance($transport);
	
        // $message = Swift_Message::newInstance()
            // ->setSubject($subject)
            // ->setFrom($from)
            // ->setTo($to)
            // ->setBody($body);

        // $mailer->send($message);
    }
}
?>