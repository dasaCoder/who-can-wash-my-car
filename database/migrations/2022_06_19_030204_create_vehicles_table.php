<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\VehicleCategory::class);
            $table->string('registration_number');
            $table->string('make');
            $table->string('name');
            $table->integer('year_of_manufacture');
            $table->string('mot_expiry_date');
            $table->string('mot_status');
            $table->string('tax_due_date');
            $table->string('tax_status');
            $table->text('image')->nullable();
            $table->enum('status', ['Active', 'Disable'])->default('Active');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
