<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpRealisasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skp_realisasi', function (Blueprint $table) {
            $table->increments('id');

            // $table->string('id_skp_target', 8);
            $table->integer('id_skp_target')->unsigned();
            $table->foreign('id_skp_target')->references('id')->on('skp_target')->onDelete('cascade')->onUpdate('cascade');

            $table->date('tanggal_awal', 8);
            $table->date('tanggal_akhir', 8);
            $table->text('lokasi');
            $table->integer('jml_realisasi');
            $table->text('keterangan');
            $table->string('path_bukti', 255);
            $table->timestamp('inserted_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('inserted_by', 8);
            $table->timestamp('edited_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('edited_by', 8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skip_realisasis');
    }
}
