<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('spent_on')->nullable();
            $table->string('spent_at')->nullable();
            $table->decimal('tax', 8, 2)->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->unsignedInteger('file_id')->nullable();
            $table->timestamps();
        });

        Schema::create('expense_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
        });

        Schema::create('expense_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('expense_id');
            $table->text('description')->nullable();
            $table->unsignedInteger('expense_account_id')->nullable();
            $table->decimal('tax_rate', 4, 2)->nullable();
            $table->decimal('amount', 8, 2)->nullable();

            $table->foreign('expense_id')->references('id')->on('expenses');
            $table->foreign('expense_account_id')->references('id')->on('expense_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_items');
        Schema::dropIfExists('expenses');
        Schema::dropIfExists('expense_accounts');
    }
}
