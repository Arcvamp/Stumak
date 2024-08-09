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
            $table->foreignIdFor(App\Models\Category::class, 'category_id');
            $table->string('title', 100);
            $table->string('image', 200);
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->boolean('negotiation')->default(false);
            $table->string('contact', 50);
            $table->string('email', 100);
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
