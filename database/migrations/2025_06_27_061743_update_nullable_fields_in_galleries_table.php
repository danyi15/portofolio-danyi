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
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('image_path')->nullable()->change();
            $table->string('video_path')->nullable()->change();
            $table->string('video_url')->nullable()->change();
            $table->string('cover_image')->nullable()->change();
            $table->string('thumbnail')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('image_path')->nullable(false)->change();
            $table->string('video_path')->nullable(false)->change();
            $table->string('video_url')->nullable(false)->change();
            $table->string('cover_image')->nullable(false)->change();
            $table->string('thumbnail')->nullable(false)->change();
        });
    }
};
