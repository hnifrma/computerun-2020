<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('university_name');

            DB::table('universities')->insert([
                ['university_name' => 'None / Uncategorized'],
                ['university_name' => 'BINUS University - Universitas Bina Nusantara'],
                ['university_name' => 'UI - Universitas Indonesia'],
                ['university_name' => 'UNJ - Universitas Negeri Jakarta'],
                ['university_name' => 'UNTAR - Universitas Tarumanegara'],
                ['university_name' => 'USAKTI - Universitas Trisakti'],
                ['university_name' => 'UPH - Universitas Pelita Harapan'],
                ['university_name' => 'UMN - Universitas Multimedia Nusantara'],
                ['university_name' => 'UEU - Universitas Esa Unggul'],
                ['university_name' => 'UNIKA Atma Jaya'],
                ['university_name' => 'UBM - Universitas Bunda Mulia'],
                ['university_name' => 'ITB - Institut Teknologi Bandung'],
                ['university_name' => 'UNPAD - Universitas Padjajaran'],
                ['university_name' => 'UNIKOM - Universitas Komputer Indonesia'],
                ['university_name' => 'UNPAR - Universitas Katolik Parahyangan'],
                ['university_name' => 'UG - Universitas Gunadarma'],
                ['university_name' => 'President University - Universitas Presiden'],
                ['university_name' => 'BSI - Universitas Bina Sarana Informatika'],
                ['university_name' => 'UMB - Universitas Mercu Buana'],
                ['university_name' => 'Universitas Pancasila'],
                ['university_name' => 'Universitas Pertamina'],
                ['university_name' => 'UNDIP - Universitas Diponegoro'],
                ['university_name' => 'IPB - Institut Pertanian Bogor'],
                ['university_name' => 'UNHAS - Universitas Hasanuddin'],
                ['university_name' => 'ITERA - Institut Teknologi Sumatera'],
                ['university_name' => 'UNBRAW - Institut Brawijaya'],
                ['university_name' => 'ITS - Institut Teknologi Sepuluh November'],
                ['university_name' => 'UPN "Veteran" - DKI Jakarta'],
                ['university_name' => 'UPN "Veteran" - DI Yogyakarta'],
                ['university_name' => 'UPN "Veteran" - Jawa Timur'],
                ['university_name' => 'YARSI - Universitas Yarsi'],
                ['university_name' => 'UIN Syarif Hidayatullah'],
                ['university_name' => 'UNS - Universitas Sebelas Maret'],
                ['university_name' => 'UGM - Universitas Gadjah Mada'],
                ['university_name' => 'UII - Universitas Islam Indonesia'],
                ['university_name' => 'UBAYA - Universitas Surabaya'],
                ['university_name' => 'Telkom University - Universitas Telkom'],
                ['university_name' => 'UNNES - Universitas Negeri Semarang'],
                ['university_name' => 'UNP - Universitas Negeri Padang'],
                ['university_name' => 'UNUD - Universitas Udayana'],
                ['university_name' => 'UNAIR - Universitas Airlangga'],
                ['university_name' => 'UNSRI - Universitas Sriwijaya'],
                ['university_name' => 'UBD - Universitas Bina Darma'],
                ['university_name' => 'UK Petra - Universitas Kristen Petra'],
                ['university_name' => 'NUS - National University of Singapore'],
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('universities');
    }
}
