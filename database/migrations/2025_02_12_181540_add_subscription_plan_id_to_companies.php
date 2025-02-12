<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('website')->nullable(); // Add website column
            $table->integer('employee_count')->default(0); // Add employee_count column
            $table->foreignId('subscription_plan_id')->nullable()->constrained('plans'); // Add subscription_plan_id column, nullable initially
        });
    }

    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['website', 'employee_count']);
            $table->dropForeign(['subscription_plan_id']);
        });
    }
};
