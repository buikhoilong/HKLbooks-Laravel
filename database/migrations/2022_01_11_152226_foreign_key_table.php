<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         // tạo khóa ngoại của categories và books
         Schema::table('books', function (Blueprint $table) {
            $table->foreign('CategoryId')->references('Id')->on('categories');
        });
        // tạo khóa ngoại cho favourites
        Schema::table('favourites', function (Blueprint $table) {
            $table->foreign('AccountId')->references('Id')->on('accounts');
            $table->foreign('BookId')->references('Id')->on('books');
        });
        //  tạo khóa ngoại cho carts
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('AccountId')->references('Id')->on('accounts');
            $table->foreign('BookId')->references('Id')->on('books');
        });
        //  tạo khóa ngoại cho rate
        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('AccountId')->references('Id')->on('accounts');
            $table->foreign('BookId')->references('Id')->on('books');
        });
        // tạo khóa ngoại Order 
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('AccountId')->references('Id')->on('accounts');
            $table->foreign('StatusId')->references('Id')->on('order_status');
        });
        // tạo khóa ngoại order_lines 
        Schema::table('order_lines', function (Blueprint $table) {
            $table->foreign('OrderId')->references('Id')->on('orders');
            $table->foreign('BookId')->references('Id')->on('books');
        });
        // tạo khóa ngoại cho promotes
        Schema::table('promotes', function (Blueprint $table) {
            $table->foreign('BookId')->references('Id')->on('books');
            $table->foreign('PromoteId')->references('Id')->on('promote_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
