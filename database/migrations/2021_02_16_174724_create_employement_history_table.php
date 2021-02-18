<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployementHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employement_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->string('current_employer',255);
            $table->string('employer_address',255);
            $table->date('started_date');
            $table->string('city',255);
            $table->string('state',255);
            $table->string('zip',20);
            $table->string('supervisor_name',100)->nullable();
            $table->string('supervisor_phone',20)->nullable();
            $table->string('supervisor_email',255)->nullable();
            $table->unsignedBigInteger('gross_income');
            $table->text('extra_income')->nullable();
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
        Schema::dropIfExists('employement_history');
    }
}
