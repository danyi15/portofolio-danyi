<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('image_path');
            $table->string('video_path');
            $table->string('video_url');
            $table->longText('description');
            $table->string('cover_image');
            $table->string('thumbnail');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
