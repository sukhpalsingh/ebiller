<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->date('due_on');
            $table->unsignedInteger('bill_category_id');
            $table->unsignedInteger('account_id');
            $table->string('status');
            $table->decimal('amount', 8, 2);
            $table->boolean('auto_pay')->nullable();
            $table->date('paid_on')->nullable();
            $table->timestamps();

            $table->foreign('bill_category_id')->references('id')->on('bill_categories');
            $table->foreign('account_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
