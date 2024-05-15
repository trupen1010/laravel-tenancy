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
        Schema::create('tenant_mail_settings', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->unique();
            $table->string('mail_mailer');
            $table->string('mail_host');
            $table->integer('mail_port');
            $table->string('mail_username');
            $table->string('mail_password');
            $table->string('mail_encryption');
            $table->string('mail_from_address');
            $table->string('mail_from_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_mail_settings');
    }
};
