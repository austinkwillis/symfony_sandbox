// src/Austin/TriggerBundle/EventListener/SingleTrigger.php
namespace Austin\TriggerBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Austin\PipelineBundle\Entity\thing;

class SingleTrigger
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        
        if($entity.getName() = "banana" && $entity.getCount() == 0){
			//send swift mail
		}
		
    }
}