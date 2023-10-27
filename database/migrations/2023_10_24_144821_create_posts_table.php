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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->string('image')->nullable();
            $table->integer('view_counts')->default(0);
            $table->unsignedBigInteger('user_id'); //phải cùng kiểu dữ liệu thì mới cho nó làm khóa ngoại được 
            $table->boolean('new_post')->default(0);
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->boolean('highlight_post');
            $table->timestamps();
            //khi user or category bi xoa thi bai viet or danh muc cung bi xoa theo
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
