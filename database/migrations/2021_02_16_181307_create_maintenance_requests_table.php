<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->string('issue',100)->default('');
            $table->tinyInteger('priority_level')->default(0)->comment('0=>low,1=>at earliest possible,2=>urgent');
            $table->string('appartment_number')->default('');
            $table->date('issue_start_date');
            $table->string('cause',150)->default('');
            $table->string('contact_number',20)->default('');
            $table->string('available_time',150)->default('');
            $table->tinyInteger('status')->default(0)->comment('0=>pending,1=>received,2=>resolved,3=>cancelled');
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
        Schema::dropIfExists('maintenance_requests');
    }
}