<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Event as IlluminateAuthEventsPunchOut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogoutSuccessful
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
     * @param  \IlluminateAuthEventsLogout  $event
     * @return void
     */
    public function handle(IlluminateAuthEventsPunchOut $event)
    {
        $event->user->checkOut();
    }
}
