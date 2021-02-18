<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->string('address',255);
            $table->unsignedBigInteger('unit_number');
            $table->unsignedTinyInteger('unit_type');
            $table->unsignedTinyInteger('bedroom');
            $table->unsignedTinyInteger('bathroom');
            $table->unsignedTinyInteger('washer_dryer');
            $table->unsignedTinyInteger('ac')->default(0);
            $table->unsignedTinyInteger('heating')->default(0);
            $table->text('appliances');
            $table->tinyInteger('parking_spot')->default(0)->comment('0=>not available, 1 => available');
            $table->unsignedSmallInteger('square_footage');
            $table->unsignedSmallInteger('rent')->default(0);
            $table->unsignedSmallInteger('year_built');
            $table->unsignedSmallInteger('year_remodeled');
            $table->date('lease_end')->nullable();
            $table->string('upload_image',255)->default('');
            $table->tinyInteger('status')->default(1)->comment('0=>active, 1 => inactive');
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
        Schema::dropIfExists('units');
    }
}
