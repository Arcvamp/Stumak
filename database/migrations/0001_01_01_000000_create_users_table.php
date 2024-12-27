<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('matric_no')->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('profile_image')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('street_address')->nullable();
            $table->string('post_code')->nullable();
            $table->text('about')->nullable();
            $table->boolean('terms_condition')->default(false);
            $table->boolean('email_verified')->default(false);
            $table->string('email_verify_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('password_changed')->default(false);
            $table->enum('verified_status', ['unverified', 'verified'])->default('unverified');
            $table->enum('status', ['inactive', 'active'])->default('inactive');
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
        Schema::dropIfExists('users');
    }
}
