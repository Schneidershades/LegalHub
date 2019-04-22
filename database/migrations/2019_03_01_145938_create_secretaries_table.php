<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecretariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secretaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_registration_id');
            $table->string('secretary_full_name')->nullable();
            $table->string('secretary_address')->nullable();
            $table->string('secretary_city')->nullable();
            $table->string('secretary_state')->nullable();
            $table->string('secretary_country')->nullable();
            $table->string('secretary_identity_no')->nullable();
            $table->string('secretary_rc_no')->nullable();
            $table->string('secretary_identity_type')->nullable();
            $table->string('secretary_nationality')->nullable();
            $table->string('secretary_email')->nullable();
            $table->string('secretary_dob')->nullable();
            $table->string('secretary_gender')->nullable();
            $table->string('secretary_phone_number')->nullable();
            $table->text('upload_id')->nullable();
            $table->text('signature')->nullable();
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
        Schema::dropIfExists('secretaries');
    }
}
