<?php

use App\Models\User;
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
        Schema::create('insurance_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->integer('insurance_no')->unique();
            $table->integer('type_id');
            $table->date('expiry_date');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_infos');
    }
};
