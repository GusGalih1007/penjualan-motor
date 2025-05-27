<?php

use Illuminate\Database\Seeder;
use App\Customers;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customers::create([
            'customerName' => 'Ajos',
            'email' => 'ajos@gmail.com',
            'phone' => '1234567890',
            'address' => 'Jl, Manggis',
            'member_status' => true,
        ]);
    }
}
