<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'type' => 'wi-fi',
                'icon' => '<i class="fa-solid fa-wifi"></i>',
            ],
            [
                'type' => 'posto macchina',
                'icon' => '<i class="fa-solid fa-car"></i>',
            ],
            [
                'type' => 'piscina',
                'icon' => '<i class="fa-solid fa-person-swimming"></i>',
            ],
            [
                'type' => 'portineria',
                'icon' => '<i class="fa-solid fa-bell-concierge"></i>
                ',
            ],
            [
                'type' => 'sauna',
                'icon' => '<i class="fa-solid fa-hot-tub-person"></i>',
            ],
            [
                'type' => 'vista mare',
                'icon' => '<i class="fa-solid fa-water"></i>',
            ],
            [
                'type' => 'palestra',
                'icon' => '<i class="fa-solid fa-dumbbell"></i>',
            ],
            [
                'type' => 'lavanderia',
                'icon' => '<i class="fa-solid fa-soap"></i>',
            ],
            [
                'type' => 'cucina',
                'icon' => '<i class="fa-solid fa-kitchen-set"></i>',
            ],
            [
                'type' => 'aria condizionata',
                'icon' => '<i class="fa-solid fa-fan"></i>',
            ],
            [
                'type' => 'animali',
                'icon' => '<i class="fa-solid fa-paw"></i>',
            ],
            [
                'type' => 'asciuga capelli',
                'icon' => '<i class="fa-solid fa-wind"></i>',
            ],
            [
                'type' => 'giardino',
                'icon' => '<i class="fa-solid fa-tree"></i>',
            ],
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->type = $service['type'];
            $newService->icon = $service['icon'];
            $newService->save();
        }
    }
}
