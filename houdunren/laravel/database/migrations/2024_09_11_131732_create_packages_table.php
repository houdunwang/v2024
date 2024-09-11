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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->comment('标题');
            $table->string('style', 1000)->default('color:#475569;background-color:#fff;')->comment('自定义样式');
            $table->string('ad', 100)->comment('一句广告语');
            $table->decimal('price')->comment('价格');
            $table->decimal('original_price')->comment('原价格');
            $table->unsignedSmallInteger('months')->comment('会员月数');
            $table->boolean('state')->default(true)->comment('开关状态');
            $table->string('icon')->comment('图片');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
