<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('identifier');
            $table->integer('transactionable_id')->unsigned();
            $table->string('transactionable_type');
            $table->decimal('amount', 40, 2)->default(0);
            $table->text('issues')->nullable();
            $table->text('error')->nullable();
            $table->string('approval')->default('Pending');
            $table->string('execution')->nullable('Pending');
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('registration_transactions');
    }
}
