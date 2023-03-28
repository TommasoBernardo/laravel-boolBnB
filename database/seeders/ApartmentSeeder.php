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
                'cover_image' => 'img/cover_img/cover_image-1.jpg',
                'visible' => true,
                'latitude' => '41.67298',
                'longitude' => '12.50059',
                'address' => 'via Roma',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-2.jpg',
                'visible' => true,
                'latitude' => '41.69468',
                'longitude' => '12.53428',
                'address' => 'via Sassuolo',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-3.jpg',
                'visible' => true,
                'latitude' => '45.4408',
                'longitude' => '12.3155',
                'address' => 'Venezia',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-4.jpg',
                'visible' => true,
                'latitude' => ' 43.7696',
                'longitude' => '11.2558',
                'address' => 'Firenze',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-5.jpg',
                'visible' => true,
                'latitude' => ' 40.8518',
                'longitude' => ' 14.2681',
                'address' => 'Napoli',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-6.jpg',
                'visible' => true,
                'latitude' => '45.4642',
                'longitude' => '9.1900',
                'address' => 'Milano',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-7.jpg',
                'visible' => true,
                'latitude' => '45.4384',
                'longitude' => '10.9916',
                'address' => 'Verona',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-8.jpg',
                'visible' => true,
                'latitude' => '38.1157',
                'longitude' => '13.3613',
                'address' => 'Palermo',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-9.jpg',
                'visible' => true,
                'latitude' => '45.0703',
                'longitude' => '7.6869',
                'address' => 'Torino',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-10.jpg',
                'visible' => true,
                'latitude' => '44.4056',
                'longitude' => '8.9463',
                'address' => 'Genova',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-11.jpg',
                'visible' => true,
                'latitude' => '44.4949',
                'longitude' => '11.3426',
                'address' => 'Bologna',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-12.jpg',
                'visible' => true,
                'latitude' => '37.5022',
                'longitude' => '15.0874',
                'address' => 'Catania',
            ],        [
                'cover_image' => 'img/cover_img/cover_image-13.jpg',
                'visible' => true,
                'latitude' => '43.3188',
                'longitude' => '11.3308',
                'address' => 'Siena',
            ],


            [
                'cover_image' => 'img/cover_img/cover_image-14.jpg',
                'visible' => true,
                'latitude' => '45.4372',
                'longitude' => '9.12342',
                'address' => 'Via Santi Fernando, 5, Milano, MI ',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-15.jpg',
                'visible' => true,
                'latitude' => '45.5865',
                'longitude' => '8.90541',
                'address' => 'Via Firenze, Legnano, MI',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-16.jpg',
                'visible' => true,
                'latitude' => '45.8216',
                'longitude' => '8.82406',
                'address' => 'Via Saverio Mercadante, Varese, VA',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-17.jpg',
                'visible' => true,
                'latitude' => '41.9107',
                'longitude' => '12.4693',
                'address' => 'Via Virginio Orsini, Roma, RM',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-18.jpg',
                'visible' => true,
                'latitude' => '43.3349',
                'longitude' => '11.3087',
                'address' => 'Siena, Strada del Petriccio e Belriguardo, Siena, SI',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-19.jpg',
                'visible' => true,
                'latitude' => '43.7712',
                'longitude' => '11.2043',
                'address' => 'Via Empoli, Firenze, FI',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-20.jpg',
                'visible' => true,
                'latitude' => '45.4769',
                'longitude' => '8.62660',
                'address' => 'Via Bellandi, Novara, NO',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-21.jpg',
                'visible' => true,
                'latitude' => '40.6849',
                'longitude' => '14.7789',
                'address' => 'Via Eugenio Reppucci, Salerno, SA',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-22.jpg',
                'visible' => true,
                'latitude' => '41.4648',
                'longitude' => '15.5404',
                'address' => 'Vicolo Erpice, Foggia, FG',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-23.jpg',
                'visible' => true,
                'latitude' => '44.4083',
                'longitude' => '12.1986',
                'address' => 'Via Mario Pasi, Ravenna, RA',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-24.jpg',
                'visible' => true,
                'latitude' => '46.2611',
                'longitude' => '10.5136',
                'address' => 'Via Villini, Ponte di Legno, BS',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-25.jpg',
                'visible' => true,
                'latitude' => '46.2213',
                'longitude' => '13.1077',
                'address' => 'Via Seffe, Buia, UD',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-26.jpg',
                'visible' => true,
                'latitude' => '45.3709',
                'longitude' => '11.0306',
                'address' => 'Via Cieca Cantarane, San Giovanni Lupatoto, VR',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-27.jpg',
                'visible' => true,
                'latitude' => '45.5197',
                'longitude' => '11.3311',
                'address' => 'Via Kennedy, Arzignano, VI',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-28.jpg',
                'visible' => true,
                'latitude' => '44.5050',
                'longitude' => '11.3640',
                'address' => 'Via Ermete Zacconi, Bologna, BO',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-29.jpg',
                'visible' => true,
                'latitude' => '44.4919',
                'longitude' => '11.3301',
                'address' => 'Via Ugo Foscolo, Bologna, BO',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-30.jpg',
                'visible' => true,
                'latitude' => '45.4967',
                'longitude' => '9.23507',
                'address' => 'Via Bruno Cesana, Milano, MI',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-31.jpg',
                'visible' => true,
                'latitude' => '45.4091',
                'longitude' => '11.8963',
                'address' => 'Via Arunzio Stella, Padova, PD',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-32.jpg',
                'visible' => true,
                'latitude' => '44.4015',
                'longitude' => '8.95991',
                'address' => 'Via Giorgio Byron, 16145 , Genova, GE
                ',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-33.jpg',
                'visible' => true,
                'latitude' => '45.1142',
                'longitude' => ' 7.55977',
                'address' => 'Via Druento, Pianezza, 10044, TO',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-34.jpg',
                'visible' => true,
                'latitude' => '46.2214',
                'longitude' => '13.1077',
                'address' => 'Via Seffe, Buia, 33030,  UD',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-35.jpg',
                'visible' => true,
                'latitude' => '45.6501',
                'longitude' => '9.11835',
                'address' => 'Via Longoni, Barlassina, MB',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-36.jpg',
                'visible' => true,
                'latitude' => '45.7961',
                'longitude' => '8.84892',
                'address' => 'Via Jean Henry Dunant, Varese, VA',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-37.jpg',
                'visible' => true,
                'latitude' => '40.5464',
                'longitude' => '14.2402',
                'address' => 'Via Krupp, Capri,80076,  NA',
            ],
            [
                'cover_image' => 'img/cover_img/cover_image-38.jpg',
                'visible' => true,
                'latitude' => '40.7168',
                'longitude' => '8.56352',
                'address' => 'Via Napoli, Sassari, SS, 07100 , Sardegna',
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
