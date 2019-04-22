<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSpecialDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_special_discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_discount_id');
            $table->integer('item_id');
            $table->integer('user_id');
            $table->integer('percentage')->nullable();
            $table->string('flexible')->default('no');
            $table->string('flexible_percentage')->nullable();
            $table->string('flexible_amount_state')->nullable();
            $table->integer('comment')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_special_discounts');
    }
}
