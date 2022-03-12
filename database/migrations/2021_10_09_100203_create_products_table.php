<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); 
            $table->string('slug');
            $table->foreignId('category_id')->constrained(); 
            $table->boolean('status')->default(1); 
            $table->float('price', 9, 0, true); 
            $table->decimal('discount', 2, 2)->default(0); 
            $table->text('description'); 
            $table->text('list_image')->nullable(); 
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
        Schema::dropIfExists('products');
    }
}