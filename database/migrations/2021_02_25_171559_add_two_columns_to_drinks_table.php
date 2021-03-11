<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoColumnsToDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drinks', function (Blueprint $table) {
            $table->decimal('purchase_price')->after('manufacturer');
            $table->decimal('sold_price')->after('purchase_price');
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
            //
        });
    }
}
