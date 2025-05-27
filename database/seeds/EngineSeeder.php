<?php

use Illuminate\Database\Seeder;
use App\Engine;

class EngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Engine::create([
            'cc' => "150cc"
        ]);
    }
}
