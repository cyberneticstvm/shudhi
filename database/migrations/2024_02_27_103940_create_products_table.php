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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->unique();
            $table->unsignedBigInteger('category_id');
            $table->decimal('price', 7, 2)->default(0)->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('youtube_video_id', 100)->nullable();
            $table->boolean('available_for_service')->default(0)->comment('1-Available, 0-Not Available')->nullable();
            $table->boolean('status')->default(1)->comment('1-Active, 0-Inactive')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
