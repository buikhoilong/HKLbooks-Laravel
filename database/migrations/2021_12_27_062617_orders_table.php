<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('Id')->primary();
            $table->string('AccountId');
            $table->integer('TotalOrder');
            $table->integer('Discount');
            $table->integer('TotalMoney');
            $table->integer('StatusId');
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdatedAt');
            $table->index('AccountId');
            $table->index('StatusId');
            $table->timestamps();
            $table->softDeletes();
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
