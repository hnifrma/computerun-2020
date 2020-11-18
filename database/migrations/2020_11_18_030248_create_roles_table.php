<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
        });
        DB::table('roles')->insert([
            ['role_name'=>'COMPUTERUN 2020 Superuser'],
            ['role_name'=>'COMPUTERUN 2020 Official Agent'],
            ['role_name'=>'COMPUTERUN 2020 Official Committee']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
