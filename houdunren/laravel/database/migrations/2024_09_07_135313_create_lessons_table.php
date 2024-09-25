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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('课程标题');
            $table->text('description')->nullable()->comment('课程介绍');
            $table->string('preview')->comment('缩略图');
            $table->string('video', 1000)->nullable()->comment('视频介绍');
            $table->decimal('price')->default(0)->comment('价格');
            $table->foreignId('chapter_id')->constrained('chapters')->cascadeOnDelete();
            $table->string('download_address')->nullable()->comment('下载地址');
            $table->unsignedInteger('video_num')->default(0)->comment('视频数量');
            $table->unsignedInteger('view_num')->default(0)->comment('观看次数');
            $table->unsignedInteger('favorite_count')->default(0)->comment('收藏数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
