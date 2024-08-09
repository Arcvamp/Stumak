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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();           
            $table->string('name')->unique(); // Role name
            $table->string('slug')->unique(); // Slug for URL-friendly role name
            $table->text('description')->nullable(); // Description of the role
            $table->boolean('is_active')->default(true); // Status of the role
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
