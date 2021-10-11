<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

//use App\Models\User;

use Mail;
use App\Models\Brand;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $request;
    public function __construct(array $request)
    {
        $this -> request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //sleep(180);
        //  Send mail to admin
        //$test = $this -> request;
        echo 'bat dau send mail';
        Mail::send('mail', array(
            'name' => $this -> request['name'],
            'email' => $this -> request['email'],
            'mobile' => $this -> request['mobile'],
            'user_query' => $this-> request['user_query'],
            'index' => $this-> request['index'],
            
        ), function($message) {
            $message->from( $this -> request['email']);
            $message->to('dokhaclam@gmail.com', 'Admin')->subject( 'queue job test 222233333');
        });
        echo 'end send mail';
        /*echo 'bat dau luu vao brand';
        for($i = 0; $i < 50;$i ++){
            $brand = new Brand;

            $brand->title = 'boy';

            $brand->save();
        }
        echo 'end luu vao brand';*/
    }
}
