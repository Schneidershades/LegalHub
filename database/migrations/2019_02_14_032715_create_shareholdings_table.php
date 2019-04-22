<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareholdingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareholdings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('company_registration_id')->nullable();
            $table->string('shareholder_full_name')->nullable();
            $table->string('shareholder_address')->nullable();
            $table->string('shareholder_city')->nullable();
            $table->string('shareholder_state')->nullable();
            $table->string('shareholder_country')->nullable();
            $table->string('shareholder_identity_no')->nullable();
            $table->string('shareholder_identity_type')->nullable();
            $table->string('shareholder_nationality')->nullable();
            $table->string('shareholder_email')->nullable();
            $table->string('shareholder_dob')->nullable();
            $table->string('shareholder_gender')->nullable();
            $table->string('shareholder_phone_number')->nullable();
            $table->text('upload_id')->nullable();
            $table->text('signature')->nullable();
            $table->integer('shares');
            $table->text('issues')->nullable();
            $table->text('error')->nullable();
            $table->string('approval')->default('Pending');
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
        Schema::dropIfExists('shareholdings');
    }
}
