<?php

namespace App\Listeners;

use App\Events\NewUserWelcome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewUserEmail;

class SendMailNewUser
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
     * @param  NewUserWelcome  $event
     * @return void
     */
    public function handle(NewUserWelcome $event)
    {
        Mail::to($event->user->email)->send(new NewUserEmail($event->user));
    }
}
