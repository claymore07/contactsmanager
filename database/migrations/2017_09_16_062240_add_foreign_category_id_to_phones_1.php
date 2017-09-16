<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignCategoryIdToPhones1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phones', function (Blueprint $table) {
            //
            $table->index('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phones', function (Blueprint $table) {
            //
            $table->dropForeign('category_id');
            $table->dropForeign('contact_id');
        });
    }
}
