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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade'); // Links to Category
            $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->onDelete('cascade'); // Links to SubCategory
            $table->foreignId('child_category_id')->nullable()->constrained('child_categories')->onDelete('cascade'); // Links to ChildCategory
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
