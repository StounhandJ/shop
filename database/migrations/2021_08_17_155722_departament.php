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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->integer("parent_category_id")->nullable(true)->change();
            $table->foreignId("department_id")->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');

        Schema::table('categories', function (Blueprint $table) {
            $table->integer("parent_category_id")->nullable(false)->change();
            $table->dropColumn("department_id");
        });
    }
}
