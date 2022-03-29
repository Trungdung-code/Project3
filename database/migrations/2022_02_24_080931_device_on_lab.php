<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeviceOnLab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_on_lab', function (Blueprint $table) {
            $table->bigIncrements('idDol');
            $table->bigInteger('status');
            $table->unsignedBigInteger('idLab')->nullable();
            $table->unsignedBigInteger('idDevice');
            $table->unsignedBigInteger('idWLab')->nullable();
            $table->unsignedBigInteger('idSLab')->nullable();
            $table->foreign('idLab')->references('idLab')->on('lab');
            $table->foreign('idDevice')->references('idDevice')->on('device');
            $table->foreign('idWLab')->references('idWLab')->on('waitinglab');
            $table->foreign('idSLab')->references('idSLab')->on('storagelab');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_on_lab');
    }
}
