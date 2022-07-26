<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Vehicle::class);
            $table->foreignIdFor(\App\Models\Location::class);
            $table->foreignIdFor(\App\Models\OrderStatus::class);
            $table->string('code');
            $table->date('date');
            $table->time('slot_start');
            $table->time('job_start');
            $table->time('job_end');
            $table->time('slot_end');
            $table->integer('ratings')->default(0);
            $table->text('review')->nullable();
            $table->text('review_reply')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
