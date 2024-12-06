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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('content');
            $table->text('filename')->nullable()->comment('文件名，在项目根目录markdown目录,升级后删除');
            $table->unsignedInteger('favour_count')->default(0)->comment('点赞数');
            $table->unsignedInteger('favorite_count')->default(0)->comment('收藏数');
            $table->boolean('recommend')->default(false)->comment('推荐');
            $table->boolean('verify')->nullable()->comment('审核通过，开放浏览');
            $table->boolean('free')->default(true)->comment('是否免费');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
