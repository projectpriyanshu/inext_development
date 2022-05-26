<?php

namespace App\Providers;

use App\Providers\StateDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StateListener
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
     * @param  \App\Providers\StateDeleted  $event
     * @return void
     */
    public function handle(StateDeleted $event)
    {
        //
    }
}
