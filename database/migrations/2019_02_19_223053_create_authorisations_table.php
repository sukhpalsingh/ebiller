<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorisations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->date('valid_from');
            $table->date('valid_until')->nullable();
            $table->integer('notify_days');
            $table->unsignedInteger('file_id')->nullable();
            $table->unsignedInteger('expense_id')->nullable();
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
        Schema::dropIfExists('authorisations');
    }
}
