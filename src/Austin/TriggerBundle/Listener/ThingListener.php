<?php

namespace Austin\TriggerBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Austin\PipelineBundle\Entity\thing;
use Austin\TriggerBundle\Util\MailHelper;

/**
 * Class thingListener
 *
 * Generic class for listening to changes for a single item
 */
class ThingListener
{
    /**
     * @param Thing              $thing
     * @param LifecycleEventArgs $event
     */
    public function preUpdate(Thing $thing, LifecycleEventArgs $event)
    {
         // $message = \Swift_Message::newInstance()
        // ->setSubject('Event Triggered!')
        // ->setFrom('aukwill@gmail.com')
        // ->setTo('aukwill@gmail.com')
        // ->setBody('Hey, listen! That thing you are tracking triggered that event you wanted to watch! Bye.');

		// $this->session->get('mailer')->send($message);
		
		$helper = new MailHelper();
        $helper->sendEmail('aukwill@gmail.com', 'aukwill@gmail.com', 'That thing you are tracking triggered that event you wanted to watch! Bye.');
    }
}