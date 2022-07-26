<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceHasVehicleCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_has_vehicle_categories', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Service::class);
            $table->foreignIdFor(\App\Models\VehicleCategory::class);
            $table->decimal('price');
            $table->integer('estimated_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_has_vehicle_categories');
    }
}
