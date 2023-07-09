<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer::factory()
            ->count(5)
            ->hasOfferItem(3)
            ->create();

        Offer::factory()
            ->count(6)
            ->hasOfferItem(4)
            ->create();

        Offer::factory()
            ->count(6)
            ->hasOfferItem(2)
            ->create();
    }
}
