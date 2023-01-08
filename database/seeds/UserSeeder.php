<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'address' => 'abc',
            'role' => '1',
            'phone_number' => '123456789',
            'password' => Hash::make('12345678'),
        ]);
    }
}
