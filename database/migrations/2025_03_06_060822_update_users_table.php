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
        Schema::table('users', function (Blueprint $table) {
            $table->string('password_reset_token')->nullable()->after('password');
            $table->string('email_verification_token')->nullable()->after('password_reset_token'); // Email verification token
            $table->boolean('email_verified')->default(false)->after('email_verification_token');
            $table->rememberToken()->after('email_verified');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['password_reset_token','email_verification_token', 'email_verified', 'remember_token']);
        });
    }
};
