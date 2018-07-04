<?php

namespace App\Console\Commands;

use App\Role;
use App\WorkTime;
use Illuminate\Console\Command;

class AddWorkTimes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work-times:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add all of the work times';

    protected $times = [
        'full time',
        'part time',
        'intership',
        'temporary',
        'permanent',
        'suitable also for students',
        'suitable also for candidates with little experience',
    ];

    /**
     * AddWorkTimes constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('------------------------- START ADDING -------------------------');

        foreach ($this->times as $time) {
            WorkTime::firstOrNew([
                'name' => $time
            ])->save();
        }

        $this->info('------------------------- FINISHED -------------------------');
    }
}
