<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('users');

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->id = $user['id'];
            $newUser->email = $user['email'];
            $newUser->password = $user['password'];
            $newUser->save();
        }
    }
}
