<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Service;

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
                'name' => '',
            ],
            [
                'name' => '',
            ],
            [
                'name' => '',
            ],
            [
                'name' => '',
            ],
            [
                'name' => '',
            ],
            [
                'name' => '',
            ],
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->name = $service['name'];
            $newService->save();
        }
    }
}
