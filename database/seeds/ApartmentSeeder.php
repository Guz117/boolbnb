<?php

use Illuminate\Database\Seeder;
use App\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = [
            [
                'title' => '',
                'price' => 3,
                'rooms' => 4,
                'beds' => 2,
                'bathrooms' => 1,
                'square' => 4,
                'address' => '',
                'latitude' => '',
                'longitude' => '',
                'image' => '',
                'visible' => 1,
            ]
        ];
    }
}
