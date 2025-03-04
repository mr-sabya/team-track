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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreignId('document_type_id')->nullable()->onDelete('cascade');
            $table->string('identifier')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->decimal('amount', 10, 2)->nullable();

            // Add period column
            $table->date('period_start')->nullable();
            $table->date('period_end')->nullable();
            $table->string('period')->nullable();


            $table->enum('status', ['active', 'expired', 'pending', 'paid'])->default('active');
            $table->string('attachment')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
