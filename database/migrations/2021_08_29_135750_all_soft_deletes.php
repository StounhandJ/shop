<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllSoftDeletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('makers', function (Blueprint $table) {
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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('makers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
