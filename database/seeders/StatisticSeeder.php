<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Statistic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


        for ($i=0; $i < 2000 ; $i++) { 
            $newStatistic = new Statistic();
            $newStatistic->apartment_id = Apartment::inRandomOrder()->first()->id;
            $newStatistic->ip_address = $faker->ipv4();
            $newStatistic->date = $faker->dateTimeBetween('-2 years', '+3 months');
            $newStatistic->save();
        }


        


    }
}
