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
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('child_category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->json('gallary_images')->nullable();
            $table->string('video_url')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('negotiable')->nullable();
            $table->string('condition')->nullable();
            $table->string('authenticity')->nullable();
            $table->string('address')->nullable();
            $table->integer('view')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->boolean('is_published')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('set null');
            $table->foreign('child_category_id')->references('id')->on('child_categories')->onDelete('set null');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('country')->onDelete('set null');
            $table->foreign('state_id')->references('id')->on('state')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('city')->onDelete('set null');
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
