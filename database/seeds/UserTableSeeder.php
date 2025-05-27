<?php

use Illuminate\Database\Seeder;
use App\Users;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'userName' => 'Admin',

            'email' => 'admin@gmail.com',

            'password' => bcrypt('12345678'),

            'role' => 'Admin',

            'phone' => '123456789',
        ]);

        Users::create([
            'userName' => 'Cashier',

            'email' => 'cashier@gmail.com',

            'password' => bcrypt('12345678'),

            'role' => 'Cashier',

            'phone' => '123456789',
        ]);
    }
}
