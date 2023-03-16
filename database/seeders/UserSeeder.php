<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $Michelangelo = new User();
        $Michelangelo->name = 'Michelangelo';
        $Michelangelo->surname = 'Napoleone';
        $Michelangelo->email = 'michelangelo007@gmail.com';
        $Michelangelo->password = Hash::make('michelangelo123');
        $Michelangelo->date_of_birth = '1990-05-15';
        $Michelangelo->save();


        for ($i = 0; $i < 10; $i++) {
            $newUSer = new User();

            $newUSer->name = $faker->name();
            $newUSer->surname = $faker->name();
            $newUSer->email = $faker->unique()->email();
            $newUSer->password = Hash::make($faker->password());
            $newUSer->date_of_birth = $faker->date();
            $newUSer->save();
        }
    }
}
