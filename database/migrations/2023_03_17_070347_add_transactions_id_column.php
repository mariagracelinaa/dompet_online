<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransactionsIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mutations', function (Blueprint $table) {
            $table->unsignedBigInteger('transactions_id');
            $table->foreign('transactions_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mutations', function (Blueprint $table) {
            $table->dropForeign(['transactions_id']);
            $table->dropColumn(['transactions_id']);
        });
    }
}
