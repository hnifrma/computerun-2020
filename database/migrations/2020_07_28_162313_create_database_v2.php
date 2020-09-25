<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create 'tickets' table
        if (!Schema::hasTable('tickets')) Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->bigInteger('nim');
            $table->text('email');
            $table->text('phone');
            $table->text('line');
            $table->text('region');
            $table->text('major');
            $table->text('otp_batch');
        });
        // Create 'events' table
        if (!Schema::hasTable('events')) Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('location')->default('Online (Zoom)');
            $table->dateTime('date', 0);
            $table->boolean('opened')->default(false);
            $table->boolean('attendance_opened')->default(false);
            $table->boolean('attendance_is_exit')->default(false);
            $table->text('url_link')->nullable();
            $table->text('totp_key');
            $table->unsignedInteger('seats')->default(0);
        });
        // Create 'registration' table
        if (!Schema::hasTable('registration')) Schema::create('registration', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->unsignedInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->integer('status');
            $table->text('remarks');
        });
        // Create 'attendance' table
        if (!Schema::hasTable('attendance')) Schema::create('attendance', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('timestamp');
            $table->unsignedInteger('registration_id');
            $table->foreign('registration_id')->references('id')->on('registration');
            $table->text('type');
        });
        // Create 'emails' table
        if (!Schema::hasTable('emails')) Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('timestamp');
            $table->text('recipient');
            $table->text('type');
        });
        // Add Main Event
        DB::table('events')->insert([
            'name' => 'Main Event',
            'date' => date('Y-m-d H:i:s', strtotime('12 September 2020, 13:00')),
            'totp_key' => uniqid(),
            'seats' => 900
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
        Schema::dropIfExists('attendance');
        Schema::dropIfExists('registration');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('events');
    }
}
