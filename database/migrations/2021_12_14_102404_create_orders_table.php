<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name'); 
            $table->string('email'); 
            $table->string('address'); 
            $table->string('note')->nullable(); 
            $table->unsignedInteger('amount_product'); 
            $table->float('origin_total'); 
            $table->float('last_total'); 
            $table->enum('order_status', ['pending', 'shipping', 'completed', 'canceled'])->default('pending'); 
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
        Schema::dropIfExists('orders');
    }
}