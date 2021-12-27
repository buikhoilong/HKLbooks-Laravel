<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lines', function (Blueprint $table) {
            $table->integer('Id')->primary();
            $table->string('OrderId');
            $table->string('BookId');
            $table->integer('Quantity');
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdatedAt');
            $table->index('BookId');
            $table->index('OrderId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lines');
    }
}
