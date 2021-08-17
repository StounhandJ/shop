<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NameToEname extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string("e_name");
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->string("e_name");
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string("e_name");
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn("name", "e_name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn("e_name");
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn("e_name");
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn("e_name");
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn("e_name", "name");
        });
    }
}
