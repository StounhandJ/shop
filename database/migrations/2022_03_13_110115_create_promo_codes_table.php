<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("percent");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId("promo_code_id")->nullable(true)->references('id')->on('promo_codes');
            $table->integer("total_price")->default(0);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->integer("total_price")->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn("promo_code_id");
            $table->dropColumn("total_price");
        });

        Schema::dropIfExists('promo_codes');
    }
};
