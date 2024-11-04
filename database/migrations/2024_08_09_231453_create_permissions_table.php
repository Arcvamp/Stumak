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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->boolean("create")->default(false);
            $table->boolean("read")->default(true);
            $table->boolean("update")->default(false);
            $table->boolean("delete")->default(false);
            $table->boolean("access")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission');
        Schema::dropIfExists('permissions');
    }
};
