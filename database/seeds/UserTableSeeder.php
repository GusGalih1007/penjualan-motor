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
            'userName' => ['Admin', 'Cashier'],

            'email' => ['admin@gmail.com', 'cashier@gmail.com'],

            'password' => bcrypt(['12345678', '12345678']),

            'role' => ['Admin', 'Cashier'],

            'phone' => ['123456789', '123456789']
        ]);
    }
}
