// src/Austin/TriggerBundle/EventListener/BucketTrigger.php
namespace Austin\TriggerBundle\EventListener;



use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Austin\PipelineBundle\Entity\thing;

class MyEventSubscriber implements EventSubscriber
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