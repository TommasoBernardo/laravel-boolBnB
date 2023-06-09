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
                'type' => 'Wi-fi',
                'icon' => '<i class="fa-solid fa-wifi"></i>',
            ],
            [
                'type' => 'Parking slot',
                'icon' => '<i class="fa-solid fa-car"></i>',
            ],
            [
                'type' => 'Pool',
                'icon' => '<i class="fa-solid fa-person-swimming"></i>',
            ],
            [
                'type' => 'Concierge',
                'icon' => '<i class="fa-solid fa-bell-concierge"></i>
                ',
            ],
            [
                'type' => 'Sauna',
                'icon' => '<i class="fa-solid fa-hot-tub-person"></i>',
            ],
            [
                'type' => 'Sea view',
                'icon' => '<i class="fa-solid fa-water"></i>',
            ],
            [
                'type' => 'Gym',
                'icon' => '<i class="fa-solid fa-dumbbell"></i>',
            ],
            [
                'type' => 'Laundry',
                'icon' => '<i class="fa-solid fa-soap"></i>',
            ],
            [
                'type' => 'Kitchen',
                'icon' => '<i class="fa-solid fa-kitchen-set"></i>',
            ],
            [
                'type' => 'Air conditioning',
                'icon' => '<i class="fa-solid fa-fan"></i>',
            ],
            [
                'type' => 'Animals',
                'icon' => '<i class="fa-solid fa-paw"></i>',
            ],
            [
                'type' => 'Hairdryer',
                'icon' => '<i class="fa-solid fa-wind"></i>',
            ],
            [
                'type' => 'Garden',
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
