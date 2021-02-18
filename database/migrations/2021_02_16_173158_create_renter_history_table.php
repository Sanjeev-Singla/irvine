<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenterHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renter_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->string('current_address',255);
            $table->string('property_manager',100)->default('');
            $table->string('city',255);
            $table->string('state',255);
            $table->string('zip',20);
            $table->string('manager_phone',20)->default('');
            $table->unsignedInteger('current_residence_length');
            $table->tinyInteger('late_payment_notice_status');
            $table->text('late_payment_notice_description')->nullable();
            $table->tinyInteger('smoking_status');
            $table->date('move_in_date');
            $table->unsignedInteger('lease_length');
            $table->text('reason_to_move')->nullable();
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
        Schema::dropIfExists('renter_history');
    }
}
