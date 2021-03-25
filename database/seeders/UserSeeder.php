<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'super_admin',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'username' => 'admin',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('admin');

        $users = User::factory(5)->create();

        $users->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
