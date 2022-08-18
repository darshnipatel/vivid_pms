<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Event as IlluminateAuthEventsPunchin;
use Session;
class LoginSuccessful
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
     * @param  \IlluminateAuthEventsLogin  $event
     * @return void
     */
    public function handle(IlluminateAuthEventsPunchin $event)
    {

        $event->user->checkIn();
        Session::flash('login-success', 'Hello ' . $event->user->name . ', welcome back!');
    }
}
