<?php

namespace Database\Seeders;

use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleCategory::create(['name' => 'Small']);
        VehicleCategory::create(['name' => 'Medium']);
        VehicleCategory::create(['name' => 'Large']);
        VehicleCategory::create(['name' => 'XL']);
    }
}
