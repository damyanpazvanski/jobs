<?php

namespace App\Console\Commands;

use App\Discount;
use Illuminate\Console\Command;

class AddDiscounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'braintree:add-discounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * SyncPlans constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('------------------------- START ADDING -------------------------');

        Discount::truncate();

        $discounts = \Braintree\Discount::all();

        foreach ($discounts as $discount) {
            Discount::create([
                'discount_id' => $discount->id,
                'name' => strtolower($discount->name),
                'amount' => $discount->amount,
                'kind' => $discount->kind,
                'neverExpires' => $discount->neverExpires,
                'numberOfBillingCycles' => $discount->numberOfBillingCycles,
                'description' => $discount->description
            ]);
        }

        $this->info('------------------------- FINISHED -------------------------');
    }
}
