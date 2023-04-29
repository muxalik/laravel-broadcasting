<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Jobs\ProgramRun;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserLoggedInListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserLoggedIn $event): void
    {
        ProgramRun::dispatchAfterResponse();
    }
}
