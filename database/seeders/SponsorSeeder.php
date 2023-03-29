<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                'name' => 'Silver subscription',
                'duration' => '24:00:00',
                'price' => 2.99,
            ],
            [
                'name' => 'Gold subscription',
                'duration' => '72:00:00',
                'price' => 5.99,
            ],
            [
                'name' => 'Diamond subscription',
                'duration' => '144:00:00',
                'price' => 9.99,
            ],

        ];

        foreach ($sponsors as $sponsor) {
            $newSponsor = new Sponsor();
            $newSponsor->name = $sponsor['name'];
            $newSponsor->duration = $sponsor['duration'];
            $newSponsor->price = $sponsor['price'];
            $newSponsor->save();
        }
    }
}
