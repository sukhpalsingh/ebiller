<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Files extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('path');
            $table->timestamps();
        });

        Schema::table('bills', function(Blueprint $table) {
            $table->unsignedInteger('file_id')->nullable()->after('account_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
        Schema::table('bills', function(Blueprint $table) {
            $table->dropColumn('file_id');
        });
    }
}
