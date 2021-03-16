<?php

namespace App\EventListener;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PostSubscriber implements EventSubscriberInterface{


    public static function getSubscribedEvents(){
        return [
            BeforeEntityPersistedEvent::class=>['setUser']
        ];
    }

    public function setUser(BeforeEntityPersistedEvent $event)
    {
        //dd($event->getEntityInstance());
    }


}