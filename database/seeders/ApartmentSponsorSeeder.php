<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $apartments = Apartment::inRandomOrder()->limit(6)->get();
       
        foreach ($apartments as $apartment) {
           
            $dateTime = Carbon::now();

            $randomSponsor = Sponsor::inRandomOrder()->first()->id;
            
            if ( $randomSponsor == 1 ) {
                $endTime =  $dateTime->addHour(24);
            }
            if ( $randomSponsor == 2 ) {
                $endTime =  $dateTime->addHour(72);
            }
            if ( $randomSponsor == 3 ) {
                $endTime =  $dateTime->addHour(144);
            }
            $apartment->sponsors()->attach( $randomSponsor , [ 'end_date' =>  $endTime ]);
        }

    }
}
