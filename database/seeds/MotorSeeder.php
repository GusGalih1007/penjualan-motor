<?php

use Illuminate\Database\Seeder;
use App\Motors;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Motors::create([
            'motorName' => 'Apakek',
            'color' => 'Blue',
            'categoryId' => 1,
            'engineId' => 1,
            'brandId' => 1,
            'numberPlate' => 'B 1234 B A',
            'condition' => 'Baru',
            'price' => 10000000,
            'stock' => 20,
            'photo' => '/motor-photos/poYBHqDoJ88siHxtKWWrDrwJSZ43CSpLZ90rIl6v.jpg',
        ]);
    }
}
