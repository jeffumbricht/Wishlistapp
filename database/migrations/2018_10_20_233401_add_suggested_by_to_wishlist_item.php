<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuggestedByToWishlistItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wishlist_items', function($table) {
            $table->integer('suggested_by_id')->nullable()->unsigned();
            $table->foreign('suggested_by_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wishlist_items', function($table) {
            $table->dropForeign(['suggested_by_id']);
            $table->dropColumn('suggested_by_id');
        });
    }
}
