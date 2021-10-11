<?php

namespace App\Listeners;

use App\Events\LoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Mail;

class SendMail implements ShouldQueue
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
     * @param  LoginHistory  $event
     * @return void
     */
    public function handle($event)
    {
        
        //dd($event -> request['name']);
        Mail::send('mail', array(
            'name' => $event -> request['name'],
            'email' => $event -> request['email'],
            'mobile' => $event -> request['mobile'],
            'user_query' => $event-> request['user_query'],
            'index' => 'test index',
        ), function($message) use ($event){
            $message->from($event -> request['email']);
            $message->to('dokhaclam@gmail.com', 'Admin')->subject($event -> request['name']);
        });
    }
}
