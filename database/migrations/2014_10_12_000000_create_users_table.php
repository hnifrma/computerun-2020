<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('university_id')->default(1);
            $table->foreign('university_id')->references('id')->on('universities');
            $table->boolean('binusian')->default(false);
            $table->bigInteger('nim')->nullable();
            $table->text('phone')->nullable();
            $table->text('line')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('id_mobile_legends')->nullable();
            $table->text('id_pubg_mobile')->nullable();
            $table->text('id_valorant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
