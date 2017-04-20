<?php

namespace App\Listeners;

use App\Events\NewOrderThanks;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewOrderThanksEmail;
use App\Mail\OrderAdminNoti;

class SendOrderDetail
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
     * @param  NewOrderThanks  $event
     * @return void
     */
    public function handle(NewOrderThanks $event)
    {
        Mail::to($event->order->useremail)->send(new NewOrderThanksEmail($event->order));
        Mail::to(config('app.email'))->send(new OrderAdminNoti($event->order));
    }
}
