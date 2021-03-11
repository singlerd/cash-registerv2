<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIdSaleToSaleIdChangeIdCurrentStateToCurrentStateIdAndIdUserToUserIdInSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->renameColumn('id_sale','sale_id');
            $table->renameColumn('id_current_state','current_state_id');
            $table->renameColumn('id_user','user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_id_change_id_current_state_to_current_state_id_and_id_user_to_user_id_in_sales', function (Blueprint $table) {
            //
        });
    }
}
