<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->integer('Id')->primary();
            $table->string('AccountId');
            $table->string('BookId')->index();
            $table->integer('Star');
            $table->text('Comment')->nullable();
            $table->text('Reply')->nullable();
            $table->integer('Status');
            $table->dateTime('CreatedAt');
            $table->timestamp('UpdatedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
