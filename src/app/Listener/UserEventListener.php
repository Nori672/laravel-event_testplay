<?php

namespace App\Listener;

use App\Events\UserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class UserEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserEvent  $event
     * @return void
     */
    public function handle(UserEvent $event)
    {
        Storage::append('user_access_log.txt','[UserEvent]'.now().' '.$event->user->name);
    }
}
