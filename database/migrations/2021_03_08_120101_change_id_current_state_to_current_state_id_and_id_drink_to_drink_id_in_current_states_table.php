<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIdCurrentStateToCurrentStateIdAndIdDrinkToDrinkIdInCurrentStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('current_states', function (Blueprint $table) {
            $table->renameColumn('id_current_state','current_state_id');
            $table->renameColumn('id_drink','drink_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('current_state_id_and_id_drink_to_drink_id_in_current_states', function (Blueprint $table) {
            //
        });
    }
}
