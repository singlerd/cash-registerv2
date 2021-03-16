<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNameColumnToDrinkNameInDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drinks', function (Blueprint $table) {
            $table->renameColumn('name', 'drink_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drinks', function (Blueprint $table) {
            $table->renameColumn('drink_name', 'name');
        });
    }
}
