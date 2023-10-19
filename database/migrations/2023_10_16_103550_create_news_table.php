<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->uuid()->primary()->unique();
            $table->string('image')->nullable();
            $table->string('headline');
            $table->text('content');
            $table->foreignUuid('user_uuid')->nullable()->constrained('users', 'uuid')->nullOnDelete()->cascadeOnUpdate();
            $table->integer('read_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
