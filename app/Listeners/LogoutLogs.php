<?php

namespace App\Listeners;

use App\Models\UserLoginHistory;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogoutLogs
{
    private $UserLogoutHistory; 
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserLoginHistory $UserLogoutHistory)
    {
        $this->UserLoginHistory = $UserLogoutHistory;
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $this->UserLoginHistory->setLogOutLog();
    }
}
