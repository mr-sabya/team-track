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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('company_id')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');


            $table->integer('country_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('address')->nullable();

            // image
            $table->string('image')->nullable();

            // notification
            $table->boolean('is_notification')->nullable();
            $table->boolean('is_mail_notification')->nullable();
            $table->integer('mail_date')->nullable();

            // user
            $table->boolean('is_superadmin')->default(0);
            $table->boolean('is_admin')->default(0);

            // employee
            $table->boolean('is_company')->default(0);
            $table->boolean('is_employee')->default(0);

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
