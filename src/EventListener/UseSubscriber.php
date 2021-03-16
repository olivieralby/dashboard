<?php

namespace App\EventListener;

use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Symfony\Component\HttpKernel\KernelEvents;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use ApiPlatform\Core\EventListener\SerializeListener;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UseSubscriber implements EventSubscriberInterface{

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['postPersist',EventPriorities::POST_WRITE]            
        ];
    }

    public function postPersist()
    {
       //dd('cool');
    }

    


}