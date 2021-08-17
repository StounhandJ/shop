<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Departament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departament', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::table('category', function (Blueprint $table) {
            $table->integer("parent_category_id")->nullable(true)->change();
            $table->foreignId("departament_id")->references('id')->on('departament');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departament');

        Schema::table('category', function (Blueprint $table) {
            $table->integer("parent_category_id")->nullable(false)->change();
            $table->dropColumn("departament_id");
        });
    }
}
