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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->boolean('is_mail_notification')->default(1);
            $table->string('email')->unique();
            $table->integer('days')->default(7);
            $table->enum('notification_type', ['email', 'sms', 'push', 'in_app'])->default('email');
            $table->enum('notification_frequency', ['immediate', 'daily', 'weekly', 'monthly'])->default('weekly');
            $table->boolean('is_enabled')->default(1);  // Whether notifications are enabled
            $table->timestamp('last_notified_at')->nullable();
            $table->boolean('notify_on_new_message')->default(1);
            $table->boolean('notify_on_comment')->default(1);
            $table->boolean('notify_on_system_alert')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
