<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ApartmentSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = [
            [
                'cover_image' => 'img/cover_image-1.jpg',
                'visible' => true,
                'latitude' => '41.67298',
                'longitude' => '12.50059',
                'address' => 'via Roma',
            ],
            [
                'cover_image' => 'img/cover_image-2.jpg',
                'visible' => true,
                'latitude' => '41.69468',
                'longitude' => '12.53428',
                'address' => 'via Sassuolo',
            ],        [
                'cover_image' => 'img/cover_image-3.jpg',
                'visible' => true,
                'latitude' => '45.4408',
                'longitude' => '12.3155',
                'address' => 'Venezia',
            ],        [
                'cover_image' => 'img/cover_image-4.jpg',
                'visible' => true,
                'latitude' => ' 43.7696',
                'longitude' => '11.2558',
                'address' => 'Firenze',
            ],        [
                'cover_image' => 'img/cover_image-5.jpg',
                'visible' => true,
                'latitude' => ' 40.8518',
                'longitude' => ' 14.2681',
                'address' => 'Napoli',
            ],        [
                'cover_image' => 'img/cover_image-6.jpg',
                'visible' => true,
                'latitude' => '45.4642',
                'longitude' => '9.1900',
                'address' => 'Milano',
            ],        [
                'cover_image' => 'img/cover_image-7.jpg',
                'visible' => true,
                'latitude' => '45.4384',
                'longitude' => '10.9916',
                'address' => 'Verona',
            ],        [
                'cover_image' => 'img/cover_image-8.jpg',
                'visible' => true,
                'latitude' => '38.1157',
                'longitude' => '13.3613',
                'address' => 'Palermo',
            ],        [
                'cover_image' => 'img/cover_image-9.jpg',
                'visible' => true,
                'latitude' => '45.0703',
                'longitude' => '7.6869',
                'address' => 'Torino',
            ],        [
                'cover_image' => 'img/cover_image-10.jpg',
                'visible' => true,
                'latitude' => '44.4056',
                'longitude' => '8.9463',
                'address' => 'Genova',
            ],        [
                'cover_image' => 'img/cover_image-11.jpg',
                'visible' => true,
                'latitude' => '44.4949',
                'longitude' => '11.3426',
                'address' => 'Bologna',
            ],        [
                'cover_image' => 'img/cover_image-12.jpg',
                'visible' => true,
                'latitude' => '37.5022',
                'longitude' => '15.0874',
                'address' => 'Catania',
            ],        [
                'cover_image' => 'img/cover_image-13.jpg',
                'visible' => true,
                'latitude' => '43.3188',
                'longitude' => '11.3308',
                'address' => 'Siena',
            ],
        ];
        foreach ($apartments as $apartment) {
            $newApartment = new Apartment();
            $newApartment->user_id = User::inRandomOrder()->first()->id;
            $newApartment->title = $faker->sentence(3);
            $newApartment->rooms = $faker->numberBetween(1, 4);
            $newApartment->beds = $faker->numberBetween(1, 4);
            $newApartment->bathrooms = $faker->numberBetween(1, 2);
            $newApartment->square_meters = $faker->numberBetween(50, 150);
            $newApartment->slug = Str::slug($newApartment->title);

            $newApartment->cover_image = $apartment['cover_image'];
            $newApartment->visible = $apartment['visible'];
            $newApartment->latitude = $apartment['latitude'];
            $newApartment->longitude = $apartment['longitude'];
            $newApartment->address = $apartment['address'];
            $newApartment->save();
        }
    }
}
