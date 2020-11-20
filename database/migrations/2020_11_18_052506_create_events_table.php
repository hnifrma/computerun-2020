<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('event_location');
            $table->dateTime('event_date');
            $table->unsignedBigInteger('event_price');
            $table->string('event_url')->nullable();
            $table->unsignedInteger('event_slots')->default(1);
            $table->unsignedInteger('event_seats')->default(0);
            $table->string('event_token')->unique()->nullable();
            $table->unsignedInteger('team_members')->default(0);
            $table->unsignedInteger('team_members_reserve')->default(0);
            $table->boolean('registration_opened')->default(false);
            $table->boolean('attendance_opened')->default(false);
        });

        DB::table('events')->insert([
            [
                'event_name'=>'Business-IT Case Competition',
                'event_location'=>'Online',
                'event_date'=>'2020-12-16 23:59:59',
                'event_price'=>300000,
                'team_members'=>3
            ],
            [
                'event_name'=>'Mobile Application Development Competition',
                'event_location'=>'Online',
                'event_date'=>'2020-12-16 23:59:59',
                'event_price'=>300000,
                'team_members'=>3
            ]
        ]);
        DB::table('events')->insert([
            [
                'event_name'=>'Mini E-Sport: Mobile Legends',
                'event_location'=>'Online',
                'event_date'=>'2020-10-03 23:59:59',
                'event_price'=>50000,
                'event_slots'=>2,
                'team_members'=>5
            ],
            [
                'event_name'=>'Mini E-Sport: PUBG Mobile',
                'event_location'=>'Online',
                'event_date'=>'2020-10-03 23:59:59',
                'event_price'=>20000,
                'event_slots'=>2,
                'team_members'=>5
            ],
            [
                'event_name'=>'Mini E-Sport: Valorant',
                'event_location'=>'Online',
                'event_date'=>'2020-10-03 23:59:59',
                'event_price'=>35000,
                'event_slots'=>2,
                'team_members'=>5
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
