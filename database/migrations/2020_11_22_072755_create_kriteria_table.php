<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id();
            $table->integer('listing_id')->unsigned();
            $table->integer('luas_tanah');
            $table->integer('luas_bangunan');
            $table->integer('jlh_kmr_tidur');
            $table->integer('jlh_kmr_mandi');
            $table->integer('jlh_lantai');
            $table->integer('daya_listrik');
            $table->bigInteger('harga');
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
        Schema::dropIfExists('kriteria');
    }
}
