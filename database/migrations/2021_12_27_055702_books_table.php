<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->string('Id')->primary();
            $table->string('Name');
            $table->integer('Price');
            $table->integer('Stock');
            $table->double('SaleOff')->nullable();
            $table->date('SaleOffStart')->nullable();
            $table->date('SaleOffEnd')->nullable();
            $table->string('ImgPath');
            $table->longText('Detail')->nullable();
            $table->string('Author');
            $table->string('Publisher');
            $table->string('CategoryId');
            $table->integer('Status');
            $table->index('Id');
            $table->index('ImgPath');
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
        Schema::dropIfExists('books');
    }
}
