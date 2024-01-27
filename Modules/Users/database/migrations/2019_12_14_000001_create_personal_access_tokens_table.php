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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64);
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            // Index
            $table->unique('token', 'u_idx_personal_access_tokens_token');
            $table->index(['tokenable_id', 'tokenable_type'], 'idx_personal_access_tokens_tokenable');
            $table->index('name', 'idx_personal_access_tokens_name');
            $table->index('last_used_at', 'idx_personal_access_tokens_last_used_at');
            $table->index('expires_at', 'idx_personal_access_tokens_expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
