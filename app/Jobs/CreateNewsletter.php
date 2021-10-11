<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Newsletters;

class CreateNewsletter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo 'bat dau luu vao newsletter';
        for($i = 0; $i < 50;$i ++){
        $newsletter = new Newsletters;

        $newsletter->email = 'lam'.$i.'@gmail.com';

        $newsletter->save();
        }
        echo 'end luu vao newsletter';
    }
}
