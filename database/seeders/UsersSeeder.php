<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('deliveboo_array.users');

        foreach ($users as $user) {
            $newuser = new User();
            $user['password'] = Hash::make($user['password']);
            $newuser->fill($user);

            $newuser->save();
        }

    }
}
