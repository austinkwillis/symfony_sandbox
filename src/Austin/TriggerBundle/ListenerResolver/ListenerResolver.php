<?php

namespace Austin\TriggerBundle\ListenerResolver;

use Doctrine\ORM\Mapping\DefaultEntityListenerResolver;

class ListenerResolver extends DefaultEntityListenerResolver
{
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function resolve($className)
    {
        $id = null;
        if ($className === 'Austin\TriggerBundle\Listener\ThingListener') {
            $id = 'thing_listener_post_update';
        }

        if (is_null($id)) {
            return new $className();
        } else {
            return $this->container->get($id);
        }
    }
}