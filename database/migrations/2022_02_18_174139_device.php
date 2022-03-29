<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Device extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('device', function (Blueprint $table) {
            $table->bigIncrements('idDevice');
            $table->string('name', 100);
            $table->bigInteger('statusdevice')->nullable();
            $table->date('import');
            $table->date('updated')->nullable();
            $table->text('note',)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('device');
    }
}
