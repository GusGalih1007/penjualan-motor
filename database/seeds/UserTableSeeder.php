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
            'userName' => 'Hardik',

            'email' => 'admin@gmail.com'. time(),

            'password' => bcrypt('123456'),

            'role' => 'Admin',

            'phone' => '123456789'
        ]);
    }
}
