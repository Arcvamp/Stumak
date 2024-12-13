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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('first_name'); // First name
            $table->string('last_name'); // Last name
            $table->string('phone_number')->unique(); // Phone number
            $table->foreignId('role_id')->constrained()->cascadeOnDelete(); // Foreign key to roles table
            $table->string('email')->unique(); // Unique email address
            $table->timestamp('email_verified_at')->nullable(); // Optional email verification timestamp
            $table->string('password'); // Password field
            $table->dateTime('last_login'); // Optional last login timestamp
            $table->mediumInteger('login_count')->default(0); // Login count with a default value
            $table->boolean('active')->default(true); // Active status, default to true
            $table->string('matric_no')->unique(); // Unique matriculation number
            $table->rememberToken(); // For "remember me" functionality
            $table->timestamps(); // Created at and updated at timestamps
        });
        

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
