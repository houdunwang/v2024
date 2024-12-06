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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained('lessons')->cascadeOnDelete();
            $table->string('title')->comment('课程标题');
            $table->string('preview')->comment('缩略图');
            $table->text('description')->nullable()->comment('课程介绍');
            $table->unsignedInteger('video_num')->default(0)->comment('视频数量');
            $table->unsignedInteger('view_num')->default(0)->comment('观看次数');
            $table->unsignedInteger('favorite_count')->default(0)->comment('收藏数');
            $table->timestamps();
            $table->string('download_address')->nullable()->comment('下载地址,不用了，升级完删除');
            $table->string('video')->nullable()->comment('下载地址,不用了，升级完删除');
            $table->decimal('price')->nullable()->comment('下载地址,不用了，升级完删除');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
