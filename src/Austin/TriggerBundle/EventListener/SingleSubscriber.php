// src/Austin/TriggerBundle/EventListener/SingleTrigger.php
namespace Austin\TriggerBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Austin\PipelineBundle\Entity\thing;

use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Austin\PipelineBundle\Entity\thing;

class SingleSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            Events::postUpdate,
        );
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entityManager = $args->getObjectManager();

        // only want to act on some "thing" entity
        if ($entity instanceof thing) {
            // do something
        }
    }
}