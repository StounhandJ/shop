<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maker', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::table('product', function (Blueprint $table) {
            $table->foreignId("maker_id")->references('id')->on('maker');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maker');

        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn("maker_id");
        });
    }
}
