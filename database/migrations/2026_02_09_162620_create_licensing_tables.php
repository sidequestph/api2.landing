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
        // 1. Licenses Table
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('license_key')->unique();
            $table->string('client_name');
            $table->string('client_email')->index();
            $table->integer('activation_limit')->default(1);
            $table->timestamp('expires_at')->nullable();
            $table->enum('status', ['active', 'revoked', 'suspended'])->default('active');
            $table->timestamps();
        });

        // 2. Activations Table (The "Lock")
        Schema::create('activations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('license_id');
            $table->string('domain')->index();
            $table->string('server_ip')->nullable();
            $table->string('wp_version')->nullable();
            $table->string('php_version')->nullable();
            $table->timestamp('last_checkin_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('license_id')->references('id')->on('licenses')->onDelete('cascade');
            $table->unique(['license_id', 'domain']);
        });

        // 3. Audit Logs Table (The Watchtower)
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('license_key')->index(); // Store key even if invalid
            $table->string('ip_address');
            $table->string('action'); // activate, check, fail_invalid, fail_limit
            $table->string('user_agent')->nullable();
            $table->json('payload')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('activations');
        Schema::dropIfExists('licenses');
    }
};
