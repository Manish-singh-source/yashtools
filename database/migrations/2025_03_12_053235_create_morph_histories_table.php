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
        Schema::create('morph_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users'); // Assuming admins are in 'users' table
            $table->morphs('modifiable'); // Stores table name and record ID dynamically
            $table->enum('action', ['deleted', 'updated', 'restored']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('morph_histories');
    }
};
