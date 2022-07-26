<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPlanHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plan_has_users', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\SubscriptionPlan::class);
            $table->foreignIdFor(\App\Models\User::class);
            $table->date('start_date');
            $table->date('expiry_date');
            $table->enum('status', ['Active', 'Renew', 'Cancel'])->default('Active');
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
        Schema::dropIfExists('subscription_plan_has_users');
    }
}
