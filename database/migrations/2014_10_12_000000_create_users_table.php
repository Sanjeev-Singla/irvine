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
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email')->unique();
            $table->string('phone',20);
            $table->date('dob')->nullable();
            $table->string('ssn',100)->default('');
            $table->string('profile_image',255)->nullable();
            $table->string('valid_id',255)->nullable();
            $table->string('financials',255)->nullable();
            $table->string('bank_statement',255)->default('');
            $table->unsignedBigInteger('income')->default(0);
            $table->string('password');
            $table->tinyInteger('is_owner')->default(0);
            $table->tinyInteger('status')->default(0);            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
