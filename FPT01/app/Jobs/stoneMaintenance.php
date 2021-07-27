<?php

namespace App\Jobs;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redis;
use Illuminate\Queue\Jobs\DatabaseJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class stoneMaintenance extends Job
{
    protected $Infomation;
    protected $Username;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name = "khac", $message = "")
    {
        $this->name = $name;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::table('maintenance')->insert([
            "Infomation"=>$this->Infomation,
            "Username"=>$this->Username,
            "Status"=>0,
            "Delete_flag"=>1,
            "Created_at"=> Carbon::now(),
            "Updated_at"=> Carbon::now(),
            "staff"=>0,
        ]);
    }
}
