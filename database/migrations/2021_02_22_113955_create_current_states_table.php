<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_states', function (Blueprint $table) {
            $table->BigIncrements('id_current_state');
            $table->foreignId('id_drink')->constrained('drinks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_measure')->constrained('measures')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('current_states');
    }
}
