<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'address' => 'Bekasi',
            'no_hp' => '0812345678',
            'password' => bcrypt('12345678'),
            'role' => '1',
        ]);
        User::create([
            'name' => 'Pelanggan',
            'email' => 'pelanggan@email.com',
            'address' => 'Bekasi',
            'no_hp' => '08987654321',
            'password' => bcrypt('12345678'),
            'role' => '2',
        ]);
    }
}
