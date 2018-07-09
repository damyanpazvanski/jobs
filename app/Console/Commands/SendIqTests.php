<?php

namespace App\Console\Commands;

use App\Candidate;
use App\CompanyAdmin;
use App\Notifications\IqTest;
use App\SentIqTest;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendIqTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sent-iq-tests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails';

    private $sendOn;

    /**
     * AddCountries constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->sendOn= Carbon::now()->addDays(1)->hour(9)->minute(0)->second(0);

        if ($this->sendOn->isWeekday()) {
            $this->sendOn->addDays(2);
        }
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sentIqTests = SentIqTest::where('count', '<', '4');

        if ($sentIqTests->count() === 0) {
            return;
        }

        $this->send($sentIqTests->get());

        $sentIqTests->increment('count');
        $sentIqTests->update([
            'send_on' => Carbon::now()
        ]);

        $sentIqTests->save();
    }

    private function send($candidates)
    {
        foreach ($candidates as $candidate) {
            $candidate->candidate->notify(new IqTest());
        }
    }
}
