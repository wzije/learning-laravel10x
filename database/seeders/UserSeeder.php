<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = new User();
        // $user->name = "user";
        // $user->username = "user";
        // $user->email = "user@gmail.com";
        // $user->password = bcrypt("123456");
        // $user->save();
        \App\Models\User::factory(5)->create();
    }
}
