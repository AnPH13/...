<?php

namespace App\Jobs;
use App\Models\postModel;
use  App\Mail\MyMail;
use \Illuminate\Support\Facades\Mail;

class MyJob extends Job
{
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
        //
        // $post = new postModel();
        // $post->name = 'an2';
        // $post->save();
        Mail::to('0306191294@caothang.edu.vn')->send(new MyMail());

    }
}
