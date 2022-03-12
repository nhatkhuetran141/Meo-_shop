<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfirmCompleteToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('is_confirmed')->default(false)->nullable(); 
            $table->boolean('is_canceled')->default(false)->nullable(); 
            $table->boolean('is_completed')->default(false)->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('is_confirmed');
            $table->dropColumn('is_canceled');
            $table->dropColumn('is_completed');
        });
    }
}