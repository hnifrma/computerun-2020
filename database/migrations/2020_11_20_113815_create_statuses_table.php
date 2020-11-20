<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status_name');
        });

        DB::table('statuses')->insert([
            ['status_name'=>'Pending'],
            ['status_name'=>'Rejected'],
            ['status_name'=>'Cancelled'],
            ['status_name'=>'Approved'],
            ['status_name'=>'Attending'],
            ['status_name'=>'Attended'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
