<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('Id')->primary();
            $table->string('Name');
            $table->date('Birthday')->nullable();
            $table->text('Address');
            $table->string('Phone')->unique();
            $table->integer('Status');
            $table->string('Email')->unique();
            $table->string('Password')->index();
            $table->boolean('Role');
            $table->index('Id');
            $table->index(['Email', 'Password']);
            $table->index(['Phone', 'Password']);
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
        Schema::dropIfExists('accounts');
    }
}
