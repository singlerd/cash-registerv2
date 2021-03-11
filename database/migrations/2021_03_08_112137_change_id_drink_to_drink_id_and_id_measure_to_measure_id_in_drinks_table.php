<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIdDrinkToDrinkIdAndIdMeasureToMeasureIdInDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drinks', function (Blueprint $table) {
            $table->renameColumn('id_drink','drink_id');
            $table->renameColumn('id_measure','measure_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drink_id_and_id_measure_to_measure_id_in_drinks', function (Blueprint $table) {
            //
        });
    }
}
