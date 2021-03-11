<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropIdCurrentStateAndIdUserColumnsFromSoldsAndAddIdSaleToSolds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('id_current_state');
            $table->dropColumn('id_user');
            $table->foreignId('id_sale')->after('id_sold')->constrained('sales')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solds_and_add_id_sale_to_solds', function (Blueprint $table) {
            //
        });
    }
}
