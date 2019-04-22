<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agentable_id')->unsigned();
            $table->string('agentable_type');
            $table->string('full_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('identity_no')->nullable();
            $table->string('rc_no')->nullable();
            $table->string('identity_type')->nullable();
            $table->string('nationality')->nullable();
            $table->string('email')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('upload_id')->nullable();
            $table->text('signature')->nullable();
            $table->text('issues')->nullable();
            $table->text('error')->nullable();
            $table->integer('approval')->nullable();
            $table->integer('done')->nullable();
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
        Schema::dropIfExists('agents');
    }
}
