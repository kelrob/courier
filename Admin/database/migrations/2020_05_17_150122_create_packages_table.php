<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('sender_fullname');
            $table->string('sender_email');
            $table->string('sender_phone')->nullable();
            $table->string('sender_address')->nullable();
            $table->string('sender_country')->nullable();
            $table->string('sender_state')->nullable();
            $table->string('sender_zip_code')->nullable();
            $table->text('secret_question');
            $table->string('receiver_fullname');
            $table->string('receiver_email');
            $table->string('receiver_phone');
            $table->string('receiver_address');
            $table->string('receiver_country');
            $table->string('receiver_state');
            $table->string('receiver_zip_code');
            $table->text('secret_answer');
            $table->text('package_description');
            $table->string('package_type');
            $table->string('duration');
            $table->string('time_initiated');
            $table->text('package_image')->nullable();
            $table->string('tracking_key')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('packages');
    }
}
