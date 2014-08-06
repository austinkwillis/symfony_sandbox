<?php

namespace Austin\TriggerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Austin\TriggerBundle;

class DefaultController extends Controller
{
    public function indexAction()
    {
		return $this->render('AustinTriggerBundle:Default:index.html.twig');
    }
	
	public function mailAction()
	{
		$message = \Swift_Message::newInstance()
        ->setSubject('Trigger Fired!')
        ->setFrom('trigger_fired@gmail.com')
        ->setTo('aukwill@gmail.com')
        ->setBody('A trigger you described to has been fired! Do something!');
		$this->get('mailer')->send($message);
	}
}
