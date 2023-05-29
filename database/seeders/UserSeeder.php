<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $user = User::create([
            'username' => 'hendrix',
            'email' => 'guysanders50@gmail.com',
            'country' => 'Afghanistan',
            'number' => '12345678',
            'password' => Hash::make('12345678'),
            'trade_key' => '12345678'
        ]);

        $user->assignRole('user');

        $user = User::create([
            'username' => 'admin',
            'email' => 'admin@aausdt.com',
            'country' => 'United States',
            'number' => '012345678',
            'password' => Hash::make('AdminAAUSDT@Portal'),
            'trade_key' => '12345678'
        ]);

        $user->assignRole('admin');

    }
}
