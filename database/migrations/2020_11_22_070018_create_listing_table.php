<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('nama_listing',150);
            $table->string('tipe_listing',20);
            $table->string('tipe_hunian',30);
            $table->text('alamat');
            $table->text('deskripsi');
            $table->string('sertifikat',30);
            $table->string('kecamatan',50);
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
        Schema::dropIfExists('listing');
    }
}
