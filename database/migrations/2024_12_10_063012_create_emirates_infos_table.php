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
        Schema::create('emirates_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->integer('emirates_id_no')->unique();
            $table->integer('card_no')->unique();
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
        Schema::dropIfExists('emirates_infos');
    }
};
