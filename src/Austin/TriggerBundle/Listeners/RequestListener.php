<?php
namespace Austin\TriggerBundle\Listeners;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Request\HttpRequestInterface;

class RequestListener
{
    public function onKernelRequest(GetResponseForRequestEvent $event)
    {
    
        if (!$event->isMasterRequest()) {
            // don't do anything if it's not the master request
            return;
        }
    
        // You get the request object from the received event
        $request = $event->getrequest();

        //optional: return response
        //$response = 

        // Send the modified response object to the event
        //$event->setResponse($response);
    }
}
?>