<?php

namespace App\Providers;

use App\Events\LoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMail
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
     * @param  LoginHistory  $event
     * @return void
     */
    public function handle(LoginHistory $event)
    {
        //
    }
}
