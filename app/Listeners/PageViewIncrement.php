<?php

namespace App\Listeners;

use App\Events\DetailPageAccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PageViewIncrement
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  DetailPageAccess  $event
     * @return void
     */
    public function handle(DetailPageAccess $event)
    {
        $event->product->view = $event->product->view + 1;
        $event->product->save();
    }
}
