<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->enum('subscription_type', ['monthly', 'yearly'])->default('monthly');
            $table->enum('subscription_status', ['pending', 'active', 'suspended'])->default('active');
            $table->timestamp('subscription_applied_at')->nullable();
            $table->date('subscription_start_date')->nullable();
            $table->date('subscription_end_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['subscription_type', 'subscription_status']);
        });
    }
};
