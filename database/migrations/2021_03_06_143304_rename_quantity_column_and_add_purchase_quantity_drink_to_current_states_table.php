<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameQuantityColumnAndAddPurchaseQuantityDrinkToCurrentStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('current_states', function (Blueprint $table) {
            $table->renameColumn('quantity', 'transferred_quantity');
            $table->decimal('purchase_quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('current_states', function (Blueprint $table) {
            //
        });
    }
}
