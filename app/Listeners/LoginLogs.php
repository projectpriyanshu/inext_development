<?php

namespace App\Listeners;

use App\Models\UserLoginHistory;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginLogs
{
    private $UserLoginHistory; 

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserLoginHistory $UserLoginHistory)
    {
        $this->UserLoginHistory = $UserLoginHistory;
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $this->UserLoginHistory->setLogInLog();
    }
}
