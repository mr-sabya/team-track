<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('trade_license')->nullable();
            $table->date('establishment_card')->nullable();
            $table->date('vehicle')->nullable();
            $table->date('domain_subscriptions')->nullable();
            $table->date('tenancy_agreement')->nullable();
            $table->date('electricity_bills')->nullable();
            $table->date('wifi_bills')->nullable();
            $table->date('sewerage_bills')->nullable();
            $table->date('mobile_bills')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
