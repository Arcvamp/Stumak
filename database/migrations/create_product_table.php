<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->int('category_id');
            $table->string('title', 100);
            $table->string('image', 200);
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->boolean('negotiation')->default(false);
            $table->string('contact', 50);
            $table->string('email', 100);
            $table->datetime('created_at');
            $table->datetime('updated_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
