<?php

namespace App\Listener;

use App\Events\UserEvent;

class MyEventSubscribe
{
    public function subscribe($event){
        $event->listen(
            UserEvent::class,
            [UserEventListener::class,'handle']
        );
    }
}