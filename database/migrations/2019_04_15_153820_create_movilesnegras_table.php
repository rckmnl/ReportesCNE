<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovilesnegrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movilesnegras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numlista');
            $table->integer('llam_ef')->nullable();
            $table->integer('llam_no_ef')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movilesnegras');
    }
}
