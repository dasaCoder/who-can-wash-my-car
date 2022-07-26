<?php

namespace Database\Seeders;

use App\Models\BusinessType;
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
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0112345678',
            'password' => Hash::make('123456789'),
            'is_approved' => 'Approved'
        ])->assignRole('admin');

        BusinessType::create(['name' => 'Partnership']);
        BusinessType::create(['name' => 'Limited/PLC']);
        BusinessType::create(['name' => 'Other']);
    }
}
