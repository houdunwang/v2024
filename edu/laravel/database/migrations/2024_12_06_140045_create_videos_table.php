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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->nullable()->constrained('lessons')->cascadeOnDelete()->comment('所属课程');
            $table->foreignId('chapter_id')->constrained('chapters')->cascadeOnDelete()->comment('所属章节');
            $table->string('title')->nullable()->comment('课程标题');
            $table->string('path', 500)->nullable()->comment('视频地址');
            $table->unsignedSmallInteger('order')->default(0)->comment('排序');
            $table->unsignedInteger('view_num')->default(0)->comment('观看次数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
