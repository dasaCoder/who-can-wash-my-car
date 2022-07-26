<?php

namespace Database\Seeders;

use App\Models\SubscriptionDuration;
use App\Models\SubscriptionPaymentTerm;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionDuration::create(['months' => 3]);
        SubscriptionDuration::create(['months' => 6]);
        SubscriptionDuration::create(['months' => 12]);

        SubscriptionPaymentTerm::create(['term' => 'One-Time']);
        SubscriptionPaymentTerm::create(['term' => 'Monthly']);
        SubscriptionPaymentTerm::create(['term' => 'Annualy']);
    }
}
