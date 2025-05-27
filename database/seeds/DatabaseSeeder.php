<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(EngineSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(MotorSeeder::class);
        $this->call(TransactionSeeder::class);
    }
}
