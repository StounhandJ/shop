<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->renameColumn("name", "login");
             $table->unique("login");
             $table->dropUnique("users_email_unique");
             $table->boolean("is_admin");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropUnique("users_login_unique");
             $table->renameColumn("login", "name");
             $table->unique("email");
             $table->dropColumn("is_admin");
        });
    }
}
